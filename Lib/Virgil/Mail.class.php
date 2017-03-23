<?php
namespace Lib\Virgil;
class Mail {
    protected $config;
    protected $mail;

    public function __construct(){

        //邮件配置
        $this->config = C('SMTP');
        if(empty($this->config)){
            $this->config = array(
                'SMTP_HOST'   => '', //SMTP服务器
                'SMTP_PORT'   => '', //SMTP服务器端口
                'SMTP_USER'   => '', //SMTP服务器用户名
                'SMTP_PASS'   => '', //SMTP服务器密码
                'FROM_EMAIL'  => '', //发件人EMAIL
                'FROM_NAME'   => '', //发件人名称
                'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
                'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
            );
        }

        require dirname(__FILE__).'/PHPMailer/PHPMailerAutoload.php';
        $this->mail             = new \PHPMailer; //PHPMailer对象
        $this->mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $this->mail->IsSMTP();  // 设定使用SMTP服务
        $this->mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
                                                   // 1 = errors and messages
                                                   // 2 = messages only
        $this->mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
        $this->mail->SMTPSecure = 'ssl';                 // 使用安全协议
        $this->mail->Host       = $this->config['SMTP_HOST'];  // SMTP 服务器
        $this->mail->Port       = $this->config['SMTP_PORT'];  // SMTP服务器的端口号
        $this->mail->Username   = $this->config['SMTP_USER'];  // SMTP服务器用户名
        $this->mail->Password   = $this->config['SMTP_PASS'];  // SMTP服务器密码
        $this->mail->SetFrom($this->config['FROM_EMAIL'], $this->config['FROM_NAME']);
        $replyEmail       = $this->config['REPLY_EMAIL']?$this->config['REPLY_EMAIL']:$this->config['FROM_EMAIL'];
        $replyName        = $this->config['REPLY_NAME']?$this->config['REPLY_NAME']:$this->config['FROM_NAME'];
        $this->mail->AddReplyTo($replyEmail, $replyName); 
    }
    /**
     * 系统邮件发送函数
     * @param string $to    接收邮件者邮箱
     * @param string $name  接收邮件者名称
     * @param string $subject 邮件主题 
     * @param string $body    邮件内容
     * @param string $attachment 附件列表
     * @return boolean 
     */
    public function sendMail($to, $name, $subject = '', $body = '', $isHtml = true, $attachment = null){
        $this->mail->isHTML($isHtml);    // Set email format to HTML
        $this->mail->Subject = $subject;
        if($isHtml)    $this->mail->Body    = $body;
        else           $this->mail->AltBody = $body;
        $this->mail->AddAddress($to, $name);
        if(is_array($attachment)){ // 添加附件
            foreach ($attachment as $file){
                is_file($file) && $this->mail->AddAttachment($file);
            }
        }
        return $this->mail->Send() ? true : $this->mail->ErrorInfo;
    }
}
