<?php
require '../vendor/autoload.php';

$db = new MysqliDb ('localhost', 'root', '', 'db_ad');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>PHP Like System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <h1>PHP Like System</h1>
<?php
$posts = $db->get('collection');

if (isset($_POST['like'])) {
    $post_id = $_POST['like'];
    $query = Array('likes'=>$db->inc(1));
    $db->where('id', $post_id);
    $db->update('collection', $query);

    $db->insert('likes', Array('post_id'=>$post_id));

}

foreach ($posts as $post) {

    echo $post["description"] .'&nbsp;<button data-postid="'.$post['id'].'" data-likes="'.$post['likes'].'" class="like">Like ('.$post['likes'].')</button><hr />';
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$(".like").click(function(){
    let button = $(this)
    let post_id = $(button).data('postid')
$.post("like.php",
{
    'like' : post_id
},
function(data, status){
    $(button).html("Like (" + ($(button).data('likes')+1) + ")")
    $(button).data('likes', $(button).data('likes')+1)
});
});
</script>
</body>
</html>
