<!-- Special Price -->
<?php
    $ctgry = array_map(function ($pro){ return $pro['item_ctgry']; }, $product_shuffle);
    $unique = array_unique($ctgry);
    sort($unique);
    shuffle($product_shuffle);

// request method post
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if (isset($_POST['special_price_submit'])){
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}

$in_cart = $Cart->getCartId($product->getData('cart'));

?>
<section id="special-price">
    <div class="container">
        <div class="row g-3">
            <div class="col-6">
                <h4 class="font-rubik font-size-20">Special Price</h4>
            </div>
            <div class="col-6">
                <div class="dropdown" style="float:right">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Sort By</button>
                    <ul class="dropdown-menu button-group" id="filters" aria-labelledby="dropdownMenuButton1">
                            <li><a class="btn is-checked" data-filter="*" href="#">All Items</a></li>
                            <?php
                                array_map(function ($ctgry){
                                    printf('<li><a class="btn" data-filter=".%s" href="#">%s</a></li>', $ctgry, $ctgry);
                                }, $unique);
                            ?>
                    </ul>
                </div>
            </div>
        </div>
        

        <div class="grid">
                <?php array_map(function ($item) use($in_cart){ ?>
                <div class="grid-item border <?php echo $item['item_ctgry'] ?? "Category" ; ?>">
                    <div class="item py-2" style="width: 200px;">
                        <div class="product font-rale">
                            <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/7.jpg"; ?>" alt="product1" class="img-fluid"></a>
                            <div class="text-center">
                                <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div class="price py-2">
                                    <span>₹<?php echo $item['item_price'] ?? 0 ?></span>
                                </div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                        if (in_array($item['item_id'], $in_cart ?? [])){
                                            echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                        }else{
                                            echo '<button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }, $product_shuffle) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->