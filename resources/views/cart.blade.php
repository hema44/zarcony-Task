@extends("layouts.app")

@section("content")
    <form action="{{route("checkout")}}" method="get">
        @csrf
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{asset("assets/images/shop/".$product->Products->image)}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <input type="hidden" name="products[]" value="{{$product->id}}">
                                    <h4><a href="">{{$product->Products->title}}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>{{$product->Products->price}}$</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        1
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{$product->Products->price}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{route("cartDelete",$product)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td>  <button type="submit" class="ms-auto btn btn-default check_out" href="">Check Out</button></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

    </form>


@endsection

@section("js")
    <script>
        let deincrement = document.getElementById("deincrement");
        let increment = document.getElementById("increment");
        let number = document.getElementById("number");

        let step = 1;
        let max = 10;
        let min = 1;

        number.oninput = () => {

            number.value = number.value>max ? max : number.value<min ? min : number.value;

        };

        increment.addEventListener("click", () => {

            if (parseInt(number.value) + step >= max) {
                number.value = max;
                return;
            }

            number.value = parseInt(number.value) + step;
            cal_price(number)
        })


        deincrement.addEventListener("click", () => {

            if (parseInt(number.value) - step <= min) {
                number.value = min;
                return;
            }

            number.value = parseInt(number.value) - step;
            cal_price(number)
        })

    </script>
    <script>
        function cal_price(ele){
            let value = ele.value;
            let price = $(ele).attr("data-price");
            let row = $(ele).closest("tr");
            console.log(price);
            row.find("td:eq(4)").text(value * price);

        }
    </script>
@endsection
