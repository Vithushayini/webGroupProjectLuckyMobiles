<?php
function MyCard($productname,$productprice,$productDetails,$productimg)
{
    $mycard="
    <form action=\"myCard.php?action=remove&id=$productname\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3 pl-0\">
                <img src=$productimg alt=\"Image1\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-6\">
                <h5 class=\"pt-2\">$productname</h5>
                <small class=\"text-secondary\">Seller:ABC Mobiles</small>
                <h5 class=\"pt-2\">$$productprice</h5>
                 <button type=\"submit\" class=\"btn  btn-warning\">Save for Later</button>
                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
            </div>
            <div class=\"col-md-3 py-5\">
                <div>
                <small class=\"text-secondary\">$productDetails</small>
                </div>
                               
            </div>
        </div>
    </div>
</form>
    ";
    //<button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
    //<input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
    //<button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
    echo $mycard;
}
?>