function payWithFlutter() {

    let user = JSON.parse($('input[name="userInfo"]').val());
    let courseId = 1;
    let ref2 = Math.floor((Math.random() * 1000000000) + 1);

    email = user.email
    amount = $('input[name="amount"]').val();

    console.log(amount);
    FlutterwaveCheckout({
        public_key: "FLWPUBK_TEST-c5f1ceaf435480e3cd9fbaafd9292dd9-X",
        tx_ref: "" + ref2,
        amount: amount,
        currency: "NGN",
        payment_options: " ",
        customer: {
            email: user.email,
            phone_number: user.phone,
            name: `${user.lastname} ${user.firstname}`,
        },
        callback: function(data) {
            $.ajax({
                url: `api`,
                method: 'POST',
                data: {
                    verifyTransaction: 'much vallllade',
                    transaction_id: data.transaction_id,
                    tx_ref: data.tx_ref,
                    amount: amount,
                    user_id: user.id
                }
            }).done((res) => {
                console.log(res);
                res = JSON.parse(res)
                if (res.success) {
                    alert('Payment Sucessfull');
                    location.reload();
                }else {
                    alert('Error making payment');
                }
            }).fail((err) => {})
        },
        customizations: {
            title: "Music Dynasty",
            description: "Account Activation",
            logo: "https://musicdynasty.ng/music/assets/img/favivon.png",
        },
    });
}
