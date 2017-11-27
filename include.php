 <?php
 if (! empty ( $_FILES ['file_stu']['name'] ))
 {
    $tmp_file = $_FILES ['file_stu']['tmp_name'];
    $file_types = explode ( ".", $_FILES['file_stu']['name'] );
    $file_type = $file_types [count( $file_types ) - 1];
     /*判别是不是.xls文件，判别是不是excel文件*/
     if (strtolower ( $file_type ) != "xls")              
    {
          $this->error ( '不是Excel文件，重新上传' );
     }
    /*设置上传路径*/
     $savePath = SITE_PATH . '/public/upfile/Excel/';
    /*以时间来命名上传的文件*/
     $str = date ( 'Ymdhis' ); 
     $file_name = $str . "." . $file_type;
     /*是否上传成功*/
     if (! copy ( $tmp_file, $savePath . $file_name )) 
      {
          $this->error ( '上传失败' );
      }
    /*
       *对上传的Excel数据进行处理生成编程数据,这个函数会在下面第三步的ExcelToArray类中
      注意：这里调用执行了第三步类里面的read函数，把Excel转化为数组并返回给$res,再进行数据库写入
    */
  $res = Service ( 'ExcelToArray' )->read ( $savePath . $file_name );
   /*
        重要代码 解决Thinkphp M、D方法不能调用的问题  
        如果在thinkphp中遇到M 、D方法失效时就加入下面一句代码
    */
   //spl_autoload_register ( array ('Think', 'autoload' ) );
   /*对生成的数组进行数据库的写入*/
   foreach ( $res as $k => $v ) 
   {
       if ($k != 0) 
      {
           $data ['uid'] = $v [0];
           $data ['password'] = sha1 ( '111111' );
           $data ['email'] = $v [1];
           $data ['uname'] = $v [3];
          $data ['institute'] = $v [4];
         $result = M ( 'user' )->add ( $data );
         if (! $result) 
         {
              $this->error ( '导入数据库失败' );
          }
      }
   }
}



class ExcelToArrary extends Service{
 public function __construct() {
     /*导入phpExcel核心类    注意 ：你的路径跟我不一样就不能直接复制*/
     include_once('./Excel/PHPExcel.php');
 }
/**
* 读取excel $filename 路径文件名 $encode 返回数据的编码 默认为utf8
*以下基本都不要修改
*/
public function read($filename,$encode='utf-8'){
          $objReader = PHPExcel_IOFactory::createReader('Excel5');
          $objReader->setReadDataOnly(true);
          $objPHPExcel = $objReader->load($filename);
          $objWorksheet = $objPHPExcel->getActiveSheet();
　　　 $highestRow = $objWorksheet->getHighestRow(); 
　　　 $highestColumn = $objWorksheet->getHighestColumn(); 
　　    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 
 　　   $excelData = array(); 
 　　　for ($row = 1; $row <= $highestRow; $row++) { 
    　　  for ($col = 0; $col < $highestColumnIndex; $col++) { 
                 $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
           } 
         } 
        return $excelData;
    }    
 }

?>