 <?php  

$imgpath="http://pic9.qiyipic.com/image/20160721/d7/d8/v_110699925_m_601.jpg";

$imgInfo = getimagesize($imgpath);
// 获取图片类型
$imgType = $imgInfo[2];
// 检测图片类型
switch ($imgType) {
    case 1: // gif
       // 采用gif方式载入
       $img = imagecreatefromgif($path);
       // 声明文件为图片类型
       header('Content-Type:image/gif;');
       // 采用gif方式输出
       imagegif($img);
       break;
    case 2: // jpg
       // 采用jpg方式载入
       $img = imagecreatefromjpeg($path);
       // 声明文件为图片类型
       header('Content-Type:image/jpeg;');
       // 采用jpeg方式输出
       imagejpeg($img);
       break;
    case 3: // png
       // 采用png方式载入
       $img = imagecreatefrompng($path);
       // 声明文件为图片类型
       header('Content-Type:image/png;');
       // 采用png方式输出
       imagepng($img);
       break;
    default:
       exit('图片格式不支持！');
}
// 销毁图片资源
imagedestroy($img);
// 删除变量
unset($img);
?>