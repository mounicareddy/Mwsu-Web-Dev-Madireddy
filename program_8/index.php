<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>



		<meta charset=utf-8 />
	<title>Client Side Pagination</title>
	<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="./css/font-awesome.css" />
	<script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="./plugin/jquery.twbsPagination.js"></script>
		<script src="./plugin/jquery.twbsPagination.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
.thumbnail img {
    width: 30%;
}
</style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group" id="categories">
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="https://c.mobofree.com/m/5/566aa54ff664d7e6508b4567_1024x768/HP-Pavilion-17-g101dx-5th-Laptops-For-sale-at-Ikeja-Lagos_2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://dewberrycinema.com/wp-content/uploads/2013/12/60dvsd7000-800x300.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="https://www.pocketables.com/images/2012/02/Top_3_Feb.gif" alt=""> 
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row" id="products">

 
                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </footer>

    </div>
	
	  <div class="col-xs-12 col-sm-8"><center>
      <ul id="pagination-demo" class="pagination-sm"></ul>
      </center>
</div>
    <!-- /.container -->

<script>
(function($) {
    //http://esimakin.github.io/twbs-pagination/
	

    var myWait;
    myWait = myWait || (function () {
        var waitDiv = $('<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="progress"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:98%"> LOADING... </div></div></div>');
        return {
            show: function() {
                waitDiv.modal();
            },
            hide: function () {
                waitDiv.modal('hide');
            },

        };
    })();

    myWait.show();

    // Set up some variables for our pagination
    var page = 1;
    var page_size = 9;
    var total_records = 0;
    var total_pages = 0;
    var rows = "";
    var col_head = "";

	$.get("https://mywebdevcourse.xyz/api/api.php/categories?order=name")
	.done(function(data) {
        
            // Pull the products out of our json object 
            var rows = data.categories.records;
			
			console.log(rows);
			
			for (var i = 0; i < rows.length; i++) {
				var cat = String(rows[i][1]).trim();
				console.log(cat);
				if(i==0)
				var categoriesButton = '<a href="#" class="list-group-item active id="categry"">'+cat+'<a>';
				else
				var categoriesButton = '<a href="#" class="list-group-item ">'+cat+'<a>';
				$('#categories').append(categoriesButton);
			}
			
	});

    function loadProductData(page, page_size,category) {
	
		var category = typeof category !== 'undefined' ?  ","+category : 0;
    
        myWait.show();
                
        // Perform a get request to our api passing the page number and page size as parameters
		//console.log("http://mwsu-web-dev.xyz/api/api.php/products?page=" + page + "," + page_size&filter=categor,eq,"+category);
		
		if(category)
			var url = "https://mywebdevcourse.xyz/api/api.php/products?page=" + page + "," + page_size + "&filter=category,eq," + category + "&order=id";
		else
			var url = "https://mywebdevcourse.xyz/api/api.php/products?page=" + page + "," + page_size + "&order=id";
	
			console.log(url);
        $.get(url)
		// The '.done' method fires when the get request completes
        .done(function(data) {
        

            // Pull the products out of our json object 
            var records = data.products.records;

            // Start an empty html string
            for (var i = 0; i < records.length; i++) {
				var item = {};
                //Start a new row for each product and put the product id in a data-element
				item.id = records[i][0];

                // Loop through each item for a product and append a table data tag to our row
                for (var j = 1; j < records[i].length; j++) {
                
                    if(j == 1){
						item.category = records[i][j] ;
					}else if(j == 2){
						item.description = records[i][j] ;
					}else if(j == 3){
						item.price = records[i][j] ;
					}else{
                        var result = records[i][j] .split(' ');
                        var img = result[0].replace("~","100");
                        item.image = "<img width=\"100\" src="+img+">";
                    }
                }
				console.log(item);
				addingproducts(item);
            }

            // At this point "rows" should have 'page_size' number of items in it,
            // so append all those rows to the body of the table.
            $('tbody').html(rows);
            
            myWait.hide();
			
		
            $('.fa-shopping-cart').click(function(){
                console.log($(this).closest('tr').data( "id" ));
                
				var item = [];
                $(this).closest('tr').find('td').each(function(){
					console.log($(this).text());
					item.push($(this).html());
				});
				console.log(item);
				addCartItem(item);
            })
    

        });
    } // End .done
	
	function addingproducts(item){
		//{id: "1", category: "tablet", description: "Fire Tablet, 7" Display, Wi-Fi, 8 GB - Includes Special Offers, Black", 
		//price: "49.99", image: "<img src=https://images-na.ssl-images-amazon.com/images/I/41A4mMSdBJL._AC_US150_.jpg>"}
		
		var words = item.description.split(" ");
		var name = words[0]+' '+words[1];
		var desc = item.description.substring(0,40) + '...';
		
		var itemdata = '';
		itemdata += '<div class="col-sm-4 col-lg-4 col-md-4">'+
		'	<div class="thumbnail">'+
		'		'+item.image +
		'		<div class="caption">'+
		'			<h4 class="pull-right">$'+item.price+'</h4>'+
		'			<h4><a href="#">'+name+'</a>'+
		'			</h4>'+
		'			<p>'+desc+'</p>'+
		'		</div>'+
		'		<div class="ratings">'+
		'			<p class="pull-right">12 reviews</p>'+
		'			<p>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star-empty"></span>'+
		'			</p>'+
		'		</div>'+
		'	</div>'+
		'</div>';
		$('#products').append(itemdata);
		
	}
	
		$('#categry').click(function(){
			$this = $(this); 
			console.log("hi");
			
			
		});
	
	$('#updateCart').click(function(){
		$('.cart-item').each(function(){
			console.log($(this).find('.price').text());
			console.log($(this).find('.count').val());

		});
	});
    
    function getTotalPages(){
        $.get("https://mywebdevcourse.xyz/api/api.php/products")

        // The '.done' method fires when the get request completes
        .done(function(data) {

            total_records = data.products.records.length;
            total_pages = parseInt(total_records / page_size);
            loadProductData(1, 12);
            $('#pagination-demo').twbsPagination({
                totalPages: total_pages,
                visiblePages: 10,
                onPageClick: function (event, page) {
                    $('#page-content').text('Page ' + page);
					$('#products').empty();
                    loadProductData(page,12);
                }
            });
			
        });

    }
    
	function addCartItem(item){
		
		var row=''+
		'<div class="row cart-item" id="item-'+item[0]+'">'+
			'<div class="col-xs-2">'+ item[4] +
			'</div>'+
			'<div class="col-xs-3">'+
			'	<h4 class="product-name"><strong>'+item[1]+'</strong></h4>'+
			'</div>'+
			'<div class="col-xs-7">'+
			'	<div class="col-xs-4 text-right">'+
			'		<h6><strong><span class="price">$'+item[3]+'</span><span class="text-muted"> x </span></strong></h6>'+
			'	</div>'+
			'	<div class="col-xs-5">'+
			'		<input type="text" class="form-control input-sm count" value="1">'+
			'	</div>'+
			'	<div class="col-xs-2">'+
			'		<button type="button" class="btn btn-link btn-xs">'+
			'			<span class="glyphicon glyphicon-trash"> </span>'+
			'		</button>'+
			'	</div>'+
			'</div>'+
		'</div>'+
		'<hr>';
		
		var postData = {};
		postData['uid']=guid;
		postData['pid']=item[0];
		postData['count']=1;
		postData['description']=item[1];
		postData['price']=item[3];
		postData['time-added']=Math.floor(Date.now() / 1000);
		
		console.log(postData);
		var cartTotal = parseFloat($('#cart-total').text());
		if(isNaN(cartTotal))
			cartTotal = 0;

		cartTotal += parseFloat(item[3]);
		console.log(cartTotal);
		$('#cart-body').append(row);
		$('#cart-total').text(cartTotal)
		$.post("https://mywebdevcourse.xyz/api/api.php/shopping_cart/",postData);
	}

 
    
	 function guid() { 
	  function s4() {
		return Math.floor((1 + Math.random()) * 0x10000)
		  .toString(16)
		  .substring(1);
	  } 
	  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
		s4() + '-' + s4() + s4() + s4();
	}
	
    getTotalPages();

 
}(jQuery));
</script>
</body>

</html>
