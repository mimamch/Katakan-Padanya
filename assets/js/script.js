$("document").ready(function(){


    

    

    $("#btn").on('click', function(e){
        e.preventDefault()
        const pesan = $(".masuk").val()
        if(pesan == ""){
            // alert('Tidak bisa mengirim pesan kosong')
            $('.berhasil').text("Tidak Dapat Mengirim Pesan Kosong!")
        }else{
            $('.berhasil').text("")
            $.ajax({
                url: '../../kirim-data.php',
                method: 'post',
                data:{
                    pesan,
                    tabel,
                },
                success: function(res){
                    let result = $.parseJSON(res)
                    let msg = []
                    result.forEach(e => {
                        msg.push(`<p class='msg'>${e}</p>`)
                    });
                    $('.boxmsg').html(msg.join(""))  

                    const pesan = $(".masuk").val("")
                }
            })
        }
        
        
    })

})

function myFunction() {
    var copyText = document.getElementById("salinlink");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);

    var tooltip = document.getElementById("salin");
    tooltip.innerHTML = "Berhasil Disalin";
}