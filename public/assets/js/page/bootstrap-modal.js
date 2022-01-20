"use strict";

$("#modal-1").fireModal({body: 'Modal body text goes here.'});
$("#modal-2").fireModal({body: 'Modal body text goes here.', center: true});

let modal_3_body = '<p>Object to create a button on the modal.</p><pre class="language-javascript"><code>';
modal_3_body += '[\n';
modal_3_body += ' {\n';
modal_3_body += "   text: 'Login',\n";
modal_3_body += "   submit: true,\n";
modal_3_body += "   class: 'btn btn-primary btn-shadow',\n";
modal_3_body += "   handler: function(modal) {\n";
modal_3_body += "     alert('Hello, you clicked me!');\n"
modal_3_body += "   }\n"
modal_3_body += ' }\n';
modal_3_body += ']';
modal_3_body += '</code></pre>';
$("#modal-3").fireModal({
  title: 'Modal with Buttons',
  body: modal_3_body,
  buttons: [
    {
      text: 'Click, me!',
      class: 'btn btn-primary btn-shadow',
      handler: function(modal) {
        alert('Hello, you clicked me!');
      }
    }
  ]
});

$("#modal-4").fireModal({
  footerClass: 'bg-whitesmoke',
  body: 'Add the <code>bg-whitesmoke</code> class to the <code>footerClass</code> option.',
  buttons: [
    {
      text: 'No Action!',
      class: 'btn btn-primary btn-shadow',
      handler: function(modal) {
      }
    }
  ]
});

$("#modal-5").fireModal({
  title: 'Tambah Buku',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-6").fireModal({
  title: 'Tambah Lokasi',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-7").fireModal({
  title: 'Pinjam Buku',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-8").fireModal({
  title: 'Tambah Supplier',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-9").fireModal({
  title: 'QrCode Product',
  body: $("#modal"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-10").fireModal({
  title: 'Tambah Pengeluaran',
  body: $("#modal"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-11").fireModal({
  title: 'Tambah Pemasukan',
  body: $("#modal"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-12").fireModal({
  title: 'Tambah Produk Masuk',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});

$("#modal-13").fireModal({
  title: 'Tambah Produk Keluar',
  body: $("#modal-login-part"),
  footerClass: 'bg-whitesmoke',
  autoFocus: true,
});


$('.oh-my-modal').fireModal({
  title: 'My Modal',
  body: 'This is cool plugin!'
});