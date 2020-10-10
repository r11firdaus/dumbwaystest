hitungbarang = (kualitas, qty) => {
    let total = 0;
    if (kualitas == 'A') {
        let harga = 3000 * qty;
        console.log(harga)
        if (qty > 10) {
            let discount = 500 * qty;
            console.log(discount)
            total = harga - discount
        }
    }
    else if (kualitas == 'B') {
        let harga = 3500 * qty;
        if (qty > 5) {
            total = harga / 2
        }
    }
    else if (kualitas == 'C') {
        let harga = 5000 * qty;
            total = harga
    }

    console.log(total)
}

hitungbarang('A', 11)