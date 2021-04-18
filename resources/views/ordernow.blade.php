@extends('master')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <table class="table">
            <tbody>
              <tr>
                <td>Amount</td>
              <td>Rs. {{$tot}}</td>
              </tr>
              <tr>
                <td>Tax</td>
                <td>Rs. 0</td>
              </tr>
              <tr>
                <td>Delivery Charges</td>
                <td>Rs. 500</td>
              </tr>
              <tr>
                <td>Total Amount</td>
              <td>Rs. {{$tot+500}}</td>
              </tr>
            </tbody>
          </table>
          <div>
            <form action="/orderplace" method="POST">
              @csrf
                <div class="form-group">
                  <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                  <label>Payment Method</label><br><br>
                  <input type="radio" value="cash" name="payment"><span>Online Payment</span><br><br>
                  <input type="radio" value="cash" name="payment"><span>EMI</span><br><br>
                  <input type="radio" value="cash" name="payment"><span>Cash on Delivery</span><br><br>
                </div>
                <button type="submit" class="btn btn-default">Order Now</button>
              </form>
          </div>
     </div>
</div>
@endsection 
