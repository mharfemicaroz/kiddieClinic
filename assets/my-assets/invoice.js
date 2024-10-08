function addInputField(t) {
  if (count == limits)
    alert("You have reached the limit of adding " + count + " inputs");
  else {
    var a = "product_name" + count,
      e = document.createElement("tr");
    (e.innerHTML =
      "<td><input type='text' name='product_name' onkeypress='invoice_productList(" +
      count +
      ");' class='form-control productSelection' placeholder='Service name' id='" +
      a +
      "' required><input type='hidden' class='autocomplete_hidden_value  product_id_" +
      count +
      "' name='product_id[]' id ='SchoolHiddenId'/></td> <td class='text-right'><input type='number' name='product_quantity[]' id='total_qntt_" +
      count +
      "' onchange='quantity_calculate(" +
      count +
      ")' onkeyup='quantity_calculate(" +
      count +
      "); stockLimit(" +
      count +
      ");' class='total_qntt" +
      count +
      " form-control text-right' value='1'/></td><td><input type='number' name='product_rate[]' readonly value='0.00' id='price_item_" +
      count +
      "' class='price_item" +
      count +
      " form-control text-right' required/></td><td><input type='number' name='discount[]' onkeyup='quantity_calculate(" +
      count +
      "); stockLimit(" +
      count +
      ");' id='discount_" +
      count +
      "' class='form-control text-right' placeholder='Discount' /></td><td class='text-right'><input class='total_price form-control text-right' type='text' name='total_price[]' id='total_price_" +
      count +
      "' value='0.00' readonly='readonly'/></td><td><input type='hidden' id='total_tax_" +
      count +
      "' class='total_tax_" +
      count +
      "' /><input type='hidden' id='all_tax_" +
      count +
      "' class='total_tax'/><button style='text-align: right;' class='btn btn-danger' type='button' value='Delete' onclick='deleteRow(this)'>Delete</button></td>"),
      document.getElementById(t).appendChild(e),
      document.getElementById(a).focus(),
      count++;
  }
}

function quantity_calculate(t) {
  var a = $("#total_qntt_" + t).val(),
    e = $("#price_item_" + t).val(),
    o = $("#discount_" + t).val(),
    l = $("#total_tax_" + t).val();
  if (a > 0) {
    var n = a * e;
    $("#total_price_" + t).val(n);
    var c = a * l;
    $("#all_tax_" + t).val(c);
  } else {
    var n = a * e;
    $("#total_price_" + t).val(n), $("#all_tax_" + t).val(l);
  }
  if (o > 0) {
    var n = a * e - o;
    $("#total_price_" + t).val(n), $("#total_tax_" + t).val(l);
  } else if (0 > o) {
    var n = a * e;
    $("#total_price_" + t).val(n), $("#total_tax_" + t).val(l);
  }
  calculateSum(), invoice_paidamount();
}

function calculateSum() {
  var t = 0,
    a = 0,
    e = 0,
    o = 0;
  $(".total_tax").each(function () {
    isNaN(this.value) ||
      0 == this.value.length ||
      (a += parseFloat(this.value));
  }),
    $("#total_tax_ammount").val(a.toFixed(0)),
    $(".total_price").each(function () {
      isNaN(this.value) ||
        0 == this.value.length ||
        (t += parseFloat(this.value));
    }),
    (o = a.toFixed(0)),
    (e = t.toFixed(0)),
    $("#grandTotal").val(+o + +e);
}

function invoice_paidamount() {
  var t = $("#grandTotal").val(),
    a = $("#paidAmount").val(),
    m = $("#insurance_value").val(),
    e = t - a - m;
  $("#dueAmmount").val(e);
}

function stockLimit(t) {
  var a = $("#total_qntt_" + t).val(),
    e = $(".product_id_" + t).val(),
    o = $(".baseUrl").val();
  $.ajax({
    type: "POST",
    url: o + "Cinvoice/product_stock_check",
    data: {
      product_id: e,
    },
    cache: !1,
    success: function (e) {
      if (a > Number(e)) {
        var o = "You can purchase maximum " + e + " Items";
        alert(o),
          $("#qty_item_" + t).val("0"),
          $("#total_qntt_" + t).val("0"),
          $("#total_price_" + t).val("0");
      }
    },
  });
}

function stockLimitAjax(t) {
  var a = $("#total_qntt_" + t).val(),
    e = $(".product_id_" + t).val(),
    o = $(".baseUrl").val();
  $.ajax({
    type: "POST",
    url: o + "Cinvoice/product_stock_check",
    data: {
      product_id: e,
    },
    cache: !1,
    success: function (e) {
      if (a > Number(e)) {
        var o = "You can purchase maximum " + e + " Items";
        alert(o),
          $("#qty_item_" + t).val("0"),
          $("#total_qntt_" + t).val("0"),
          $("#total_price_" + t).val("0.00"),
          calculateSum();
      }
    },
  });
}

function deleteRow(t) {
  var a = $("#normalinvoice > tbody > tr").length;
  if (1 == a) alert("There only one row you can't delete.");
  else {
    var e = t.parentNode.parentNode;
    e.parentNode.removeChild(e), calculateSum();
  }
}

var count = 2,
  limits = 500;
