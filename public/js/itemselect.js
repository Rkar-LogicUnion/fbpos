new Vue({
    el: "#root",
    data: {
        orderID: 0,
        orders: [],
        addOns: [],
        addOnShow: false,
        discount: {
            id: 0,
            percent: 0
        },
        type: 1
    },
    methods: {
        addOrder(id, name, type, price) {
            let order = this.orders.push({
                adv_id: Date.now(),
                id,
                name,
                type,
                price,
                quantity: 1,
                addOns: []
            });
            this.orderID = this.orders[order - 1].adv_id;
        },
        addAddOns(id, name, type, price) {
            let order = this.orders.find(ele => ele.adv_id == this.orderID);
            order.addOns.push({ id, name, type, price, quantity: 1 });
        },
        addSets(id, name, type, price) {
            axios.get("/api/sets/" + id).then(response => {
                this.orders.push({
                    id,
                    name,
                    type,
                    price,
                    quantity: 1,
                    addOns: [],
                    items: response.data
                });
            });
        },
        showAddOn(id) {
            axios.get("api/item/addons/" + id).then(response => {
                this.addOns = response.data;
            });
            this.addOnShow = true;
        },
        discountChange(id, percent) {
            this.discount.id = id;
            this.discount.percent = percent;
        },
        checkout() {
            const orderSent = {
                orderID: Date.now(),
                orders: this.orders,
                discount: this.discount,
                type: this.type,
                subtotal: this.subTotal,
                grandtotal: this.grandTotal
            };
            axios
                .post("api/checkout", orderSent)
                .then(function(response) {
                    window.location.replace = "/receipts";
                    alert("Save Successful");
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    },
    mounted() {},
    computed: {
        hasOrder() {
            return !this.orders.length;
        },
        subTotal() {
            var st = 0;
            this.orders.forEach(order => {
                st += Number(order.price * order.quantity);
                order.addOns.forEach(addon => {
                    st += Number(addon.price * addon.quantity);
                });
            });
            return st;
        },
        percentTotal() {
            var p = this.discount.percent / 100;
            return (p * this.subTotal).toPrecision(2);
        },
        grandTotal() {
            return this.subTotal - this.percentTotal;
        }
    }
});
