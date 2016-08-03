<?php

$q=$_GET["q"];
$qlist=curlGet("http://expand.video.iqiyi.com/api/category/list.json?apiKey=71c300df4a7f4e89a43d8e19e5458e6f");
// echo $qlist;


$list=curlGet("http://expand.video.iqiyi.com/api/album/list.json?apiKey=eff9fc20731447578ebafa045bfd487d&categoryId=".$q);
// echo json_encode($list);
function curlGet($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $info = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Errno' . curl_error($ch);
    } else {
       // echo 'success!!!';
    }

    curl_close($ch);

    return json_decode($info);
}
?>
<html>
<head>

<title> 爱奇艺</title>
<style type="text/css">
    
    body{
        padding: 50px;
    }
</style>
<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script>
    function star(id,name,desc){
       $.ajax(
        {
            url:"json.php?name="+name+"&id="+id+"&desc="+desc,
            type:"get",
            success:function(data1){
               alert(data1);
            }
        });
       
    }
   function model(src){

     $.ajax(
        {
            url:src,
            type:"get",
            success:function(data1){
               $("#swf").attr("src",data1);
            }
        });
     
//      $('#model').on('shown.bs.modal', function () {
//   // $('#myInput').focus()
// });
   }

</script>
</head>
<body>
<div class="well">
<div class="page-header">
  <h1>爱奇艺<small>视频</small></h1>   <a href="star.php">收藏的视频</a>
</div>
<ul class="nav nav-tabs">
<?php 

    for($i=0;$i<count($qlist->data);$i++){
        if($q==$qlist->data[$i]->categoryId){
       echo '<li role="presentation" class="active"><a href="index.php?q='.$qlist->data[$i]->categoryId.'">'.$qlist->data[$i]->categoryName.'</a></li>';

        }else{
       echo '<li role="presentation" ><a href="index.php?q='.$qlist->data[$i]->categoryId.'">'.$qlist->data[$i]->categoryName.'</a></li>';

        }
    }

    ?>
</ul>

 <table class="table table-bordered">
  <thead>
      <th>ID</th>
      <th>PICURL</th>
      <th>NAME</th>
      <th>DESC</th>
      <th>ACTION</th>
  </thead>
 <?php 

    for($i=0;$i<count($list->data);$i++){
       echo '<tr><td>'.$list->data[$i]->albumId.'</td>'.
            '<td><a href="'.$list->data[$i]->picUrl.'">查看图片</a></td>'.
            '<td>'.$list->data[$i]->albumName.'</td>'.
            '<td>'.$list->data[$i]->desc.'</td>'.
            '<td><a href="swf.php?vid='.$list->data[$i]->tvIds[0].'" target="_blank" class="btn btn-success" >预览</a><button onclick="star(\''.$list->data[$i]->albumId.'\',\''.$list->data[$i]->albumName.'\',\''.$list->data[$i]->desc.'\')" class="btn btn-warning">收藏</button></td><tr>';
    }

    ?>
</table>
  </div>




<!-- Modal -->
<div class="modal fade" id="Model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
         <div style="width:375px;height:667px;">
         <video id="swf" style="width:375px;height:667px;" src="" controls>
           
         </video>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>