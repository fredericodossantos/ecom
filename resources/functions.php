
<?php


// HELPER FUNCTIONS


function redirect($location){
    header("Location: $location ");
}


function query($sql) {

    global $connection;
    return mysqli_query($connection, $sql);

}

function confirm($result){

    global $connection;

    if(!$result){
        die("QUERY FAILED ". mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){

    return mysqli_fetch_array($result);

}


/*******************************FRONT END FUNTIONS ***********************************/
// GET PRODUCTS

function  get_products(){

 $query = query(" SELECT * FROM products");
 confirm($query);

 while($row = fetch_array($query)){

    $product = <<<DELIMETER

        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                <div class="caption">
                    <h4 class="pull-right">R&#36; {$row['product_price']}</h4>
                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                    </h4>
                    <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                </div>
                <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">View Tutorial</a>


            </div>
        </div>

    DELIMETER;

    echo $product;
 }


}


function get_categories(){

    $query = query("SELECT * FROM categories");
    confirm($query);
        
    while($row = fetch_array($query)) {

        $categories_links = <<<DELIMETER

        <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
        

        DELIMETER;
                
        echo $categories_links;
    
    }


}



function get_products_in_cat_page (){

    $query = query(" SELECT * FROM products WHERE product_category_id =" . escape_string($_GET['id']). " ");
    confirm($query);

     while($row = fetch_array($query)){

        $product_by_cat = <<<DELIMETER

        <div class="col-sm-4 col-lg-4 col-md-4">
            <div class="thumbnail">
            <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                <div class="caption">
                    <h4 class="pull-right">R&#36; {$row['product_price']}</h4>
                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                    </h4>
                    <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                    
                    <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Buy Now!</a>    
                    <a class="btn btn-default" target="_blank" href="item.php?id={$row['product_id']}">More Info</a>
                    
                </div>
                


            </div>
        </div>

    DELIMETER;

    echo $product_by_cat;
     }


}












/*******************************BACK END FUNTIONS ***********************************/

?>