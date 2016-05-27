@extends("userpanel.test")
@section('title')
  Main Content
@endsection
@section('subcontent')
    Our Book
@endsection
@section('content') 

                        
                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">   
                                    @foreach($data as $value)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    

                                                    <img src="<?php echo url('upload/logo')?>/<?php echo $value->book_image?>" alt="">
                                                    <h2>{{$value->book_name}}</h2>
                                                    <p><a href="{{URL::to('book_details/'.$value->id)}}" id="book_details_links" data-val="<?php echo $value->id?>">Book Details</a></p>
                                                    <p><a href="{{URL::to('read_book/'.$value->id)}}" id="book_details_links" data-val="<?php echo $value->id?>">Read Book</a></p>
                                                    <a href="<?php echo url('download_book')?>/<?php echo $value->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Download</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                
                            </div>


                                        
                        </div>
{!!Html::script("userassets/js/jquery.js")!!}
<script type="text/javascript">
    // $(document).ready(function(){
    //     $(document).on('click',"#book_details_links",function(){
    //         var id=$(this).attr('data-val');
    //         var url="<?= URL::to('book_details')?>";
    //         $.ajax({
    //             url:url,
    //             type:"POST",
    //             data:{'id':id},
    //             async:false,
    //             success:function(data){
    //                 alert(data);
    //             },
    //             // cache:false,
    //             // processData:false,
    //             // contentType:false,
    //             error: function (XMLHttpRequest, textStatus, errorThrown) {
    //                 alert(XMLHttpRequest.responseText);
    //             }
    //         });
    //     });
    // });
</script>
@endsection

