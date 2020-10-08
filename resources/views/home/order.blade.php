<div>
    <div v-show="addOnShow" style="position: absolute;top:0;left:0;width:100%;height:100%;background-color:rgba(0, 0, 0, 0.5)" v-on:click.self="addOnShow=false">
        <div class="card mb-3 border-success w-50 m-auto">
            <div class="card-header bg-success">
                Choose AddOn
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="addon in addOns">
                    <a href="#" class="list-group-item list-group-item-action" v-on:click.prevent="addAddOns(addon.id,addon.name,'addon',addon.price)">
                        @{{ addon.name }}
                        <span class="badge badge-primary badge-pill float-right">$ @{{ addon.price }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">QTY</th>
          <th scope="col">ITEM</th>
          <th scope="col">AMOUNT</th>
          <th scope="col">AddOn</th>
        </tr>
      </thead>
      <tbody>
            <tr v-for="(order,index) in orders" v-bind:class="[order.type=='set' ? 'text-danger':'',order.type=='item' ? 'text-primary':'']">
                <td>@{{ index+1 }}</td>
                <td>
                    <input type="number" name="" v-model="order.quantity">
                </td>
                <td>
                    <span>@{{ order.name }}</span>
                    <ul class="list-unstyled" v-if="order.addOns">
                        <li v-for="addon in order.addOns" class="text-success">
                           <input type="number" name="" v-model="addon.quantity" style="width: 50px"> @{{ addon.name }}
                        </li>
                    </ul>
                    <ul class="list-unstyled" v-if="order.items">
                        <li v-for="item in order.items">
                            (@{{ item.pivot.quantity }}) @{{ item.name }}
                        </li>
                    </ul>
                </td>
                <td class="text-right">
                    <span>@{{ order.price*order.quantity }}</span>
                    <ul class="list-unstyled" v-if="order.addOns">
                        <li v-for="addon in order.addOns" class="text-success">
                            @{{ addon.price*addon.quantity  }}
                        </li>
                    </ul>
                    <ul class="list-unstyled" v-if="order.items">
                        <li v-for="item in order.items">
                            0.00
                        </li>
                    </ul>
                </td>
                <td>
                    <p v-if="order.type=='set'" class="mb-4"></p>
                    <ul class="list-unstyled" v-if="order.type=='item'">
                        <li>
                            <a href="#" v-on:click.prevent="showAddOn(order.id)" class="badge badge-primary">AddOn</a>
                        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    Sub Total
                </td>
                <td style="text-align: right" v-text="subTotal"></td>
            </tr>
             <tr v-if="discount.id>0">
                <td colspan="3" style="text-align: center">
                    Discount
                </td>
                <td style="text-align: right" v-text="percentTotal"></td>
            </tr>
             <tr>
                <td colspan="3" style="text-align: center">
                    Grand Total
                </td>
                <td style="text-align: right" v-text="grandTotal"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center">
                    CASH
                </td>
                <td style="text-align: right" v-text="grandTotal"></td>
            </tr>
      </tbody>
    </table>
    <div class="text-right">
        <a href="#" class="btn btn-primary" v-on:click.prevent="checkout">Check Out</a>
    </div>
</div>
