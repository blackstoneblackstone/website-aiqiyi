<?php 
$star= file_get_contents("json/starjson.json");

$arr=explode(";",$star);



?>


<title> 爱奇艺收藏</title>
<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">
	body{
		padding: 50px;
	}
</style>
</head>
<body>

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
      <th>NAME</th>
      <th>DESC</th>
      <th>ACTION</th>
  </thead>
 <?php 

    for($i=0;$i<(count($arr)-1);$i++){
        $ob=json_decode($arr[$i]);

       echo '<tr><td>'.$ob->id.'</td>'.
            '<td>'.$ob->name.'</td>'.
            '<td>'.$ob->desc.'</td>'.
            '<td><a href="swf.php?vid='.$ob->id.'" class="btn btn-success">预览</a></td><tr>';
    }

    ?>
</table>
  

</body>
</html>