function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split           = number_string.split(','),
    sisa             = split[0].length % 3,
    rupiah             = split[0].substr(0, sisa),
    ribuan             = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka satuan ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
$(document).ready(function() {

    $('.detail').click(function() {
        // console.log('id');
        $('#detailProduct').modal('show');
        var id = $(this).data('id');
        $.ajax({
            type: "GET",
            url: 'product/' + id,
            success: function(data) {
            console.log(data);

            var diskon = data.discount;
            var harga   = data.price;
            var final = harga/diskon;
            var format = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(final);
            var formatPrice = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(harga);
            // console.log(formatRupiah(final + 'Rp.'));
            // console.log('harga' + final);
            $('#nama').text(data.product_name);   
            if(final != Infinity)
            {
                $('#diskon').text(format);
            }else{
                $('#diskon').text('');
            }
            $('#harga').text(formatPrice);
            $('#dimensi').text(data.dimension);
            $('#unit').text(data.unit);
            }

        });
    });
});