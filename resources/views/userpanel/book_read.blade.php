@extends("userpanel.test")
@section('title')
  Main Content
@endsection
@section('subcontent')
    Read Book
@endsection
@section('content') 

<div class="col-sm-12 padding-right"> 


    <div class="category-tab shop-details-tab"><!--category-tab-->

        <div class="tab-content">
            <h4 style="text-align: center;color: #ff9900;">{{$bookById->book_name}}</h4>
            <h4 style="text-align: center;color: #ff9900;">{{$bookById->book_writter}}</h4>
            <h4 style="text-align: center;color: #ff9900;">{{$bookById->book_edition}}</h4><br>
            <div>
                
                    <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i> Software Engineering by Lan somar bill(for login)</a>
               
                    <a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Software Engineering by Lan somar bill(without login)</a>
                
            </div>  
            <iframe src="<?php echo url('upload/logo')?>/<?php echo $bookById->book_pdf?>" height="800px" width="800px"></iframe>  


        </div><br><br>

        <div>
            <table border="1"  style="align:center;">
                <tr >
                    <td style="width: 100px; text-align: center; color: #ff9900;">Name</td>
                    <td style="text-align: center;color: #ff9900;">comments</td>
                    <td style="text-align: center;color: #ff9900;">user action</td>
                </tr>
                
                    <tr>
                        <td style="color: #33ccff;">Author name</td>
                        <td style="color: #33ccff;">Comment</td>
                        <td style="color: #33ccff;">
                           
                                <a href="">Edit</a>&nbsp;&nbsp;&nbsp;
                                
                               
                                <p  id="res" onclick="">like<p/>
                                    
                                            
                                
                                        </td>
                                        </tr>
                                   
                                    </table>
                                    </div>

                                   All Comment
                                    </div>
                                    </div><!--/category-tab-->

@endsection

                             

