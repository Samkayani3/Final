@extends('vendor.vendor_layouts.main_layout')

@section('content')


<div class="container-fluid" style="margin-left:350px; padding:30px; margin-right:150px; margin-top:30px;">


<div class="widget-box" >
         <h3>June 2021</h3>
         <hr>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead style="color:white;background-color:black;">
                <tr>
                  <th><h6>Product ID</h6></th>
                  <th><h6>Product Name</h6></th>
                  <th><h6>Product Price</h6></th>
                  <th><h6>Product Code</h6></th>
                  <th><h6>Stock</h6></th>
                  <th><h6>Sales</h6></th>
                  
                </tr>
              </thead>
              <tbody style="background-color:DarkSlateGrey; color:white;">
                  <!-- @foreach($products as $product)
                <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->product_name}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->product_code}}</td>
                  <td>{{$product->stock}}</td>
            
        
                  
                  </tr>
                 @endforeach -->
                 <tr>
                 <td>43</td>
                 <td>Watermelon Seeds</td>
                 <td>50</td>
                 <td>	WMS-001</td>
                 <td>10</td>
                 <td>5</td>
                 </tr>

                 <tr>
                 <td>44</td>
                 <td>	Coffee Beans</td>
                 <td>1000</td>
                 <td>CB-001</td>
                 <td>8</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>45</td>
                 <td>Kidney Beans</td>
                 <td>600</td>
                 <td>	KB-001</td>
                 <td>0</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>46</td>
                 <td>Band Ghoobhi</td>
                 <td>50</td>
                 <td>	BG-001</td>
                 <td>3</td>
                 <td>4</td>
                 </tr>

                 <tr>
                 <td>47</td>
                 <td>Cashew Nuts</td>
                 <td>1000</td>
                 <td>	CN-001</td>
                 <td>9</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>48</td>
                 <td>Pineapple Seeds</td>
                 <td>300</td>
                 <td>PAS-001</td>
                 <td>5</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>40</td>
                 <td>Almonds</td>
                 <td>1000>/td>
                 <td>	Almonds001</td>
                 <td>15</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>50</td>
                 <td>Walnut</td>
                 <td>1000</td>
                 <td>	W-001</td>
                 <td>6</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>51</td>
                 <td>Electric Spray Machine</td>
                 <td>	6000</td>
                 <td>	ESP-001</td>
                 <td>10</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>52</td>
                 <td>ZEP Pesticide Spray Bottle</td>
                 <td>300</td>
                 <td>ZEP-001</td>
                 <td>2</td>
                 <td>0</td>
                 </tr>

                 <tr>
                 <td>53</td>
                 <td>Wheat Grains</td>
                 <td>3000</td>
                 <td>	WG-001</td>
                 <td>11</td>
                 <td>0</td>
                 </tr>
                  </tbody>
                  </table>
                  </div>
                  </div>

</div>





@endsection