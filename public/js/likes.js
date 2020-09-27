//   alert('feras');

$(".like").on('click',function(){
    // alert("The paragraph was clicked.");

    var like_s = $(this).attr('data-like');
    var post_id = $(this).attr('data-postid');


    $.ajax({
        type: 'POST',
        url: url ,
        data : {like_s: like_s, post_id: post_id, _token:token},
        success:function(data){
            alert(data.is_like);

        }
    });


  });
