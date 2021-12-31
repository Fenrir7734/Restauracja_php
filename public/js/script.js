
function addMobile() {
    $(".navbar").addClass("nav-mobile fixed-top")
        .removeClass("sticky-top");
}

function removeMobile() {
    $(".navbar").removeClass("nav-mobile")
        .addClass("sticky-top");

    if(document.location.href.endsWith("index.html")) {
        $(".navbar").removeClass("fixed-top");
    }
}

$(window).resize(function () {
    if ($(window).width() <= 991) {
        addMobile();
    } else {
        removeMobile();
    }
});

$(window).ready(function () {
   if($(window).width() <= 991) {
       addMobile();
   } else {
       removeMobile();
   }
});

$(function () {
    $(".pan")
        .on("mouseover", function () {
            $(this).css({
                'transform' : 'scale(1.2)',
                'transition' : 'transform .5s'
            });
        })
        .on("mouseout", function () {
            $(this).css({
                'transform' : 'scale(1)'
            });
        })
        .on("mousemove", function(event) {
            var w = ((event.pageX - $(this).offset().left) / $(this).width() * 100);
            var h = ((event.pageY - $(this).offset().top) / $(this).height() * 100);
            $(this).css({
                'transform-origin' : w + '% ' + h + '%'
            });
        });
});

$(function() {
   var today = new Date();

   var startMonth = today.getMonth() + 1;
   var startDay = today.getDate();
   var startYear = today.getFullYear();

   var endMonth = startMonth + 5;
   var endYear = startYear;
   var endDay = startDay;

   if(endMonth > 12) {
       endMonth -= 12;
       endYear++;
   }

   var daysInMonth = new Date(endYear, endMonth, 0).getDate();
   if(daysInMonth < endDay) {
       endDay -= daysInMonth;
       endMonth++;

       if(endMonth > 12) {
           endMonth -= 12;
           endYear++;
       }
   }

   if(startMonth < 10) {
       startMonth = '0' + startMonth.toString();
   }

   if(startDay < 10) {
       startDay = '0' + startDay.toString();
   }

   if(endMonth < 10) {
       endMonth = '0' + endMonth.toString();
   }

   if(endDay < 10) {
       endDay = '0' + endDay.toString();
   }

   var startDate = startYear + '-' + startMonth + '-' + startDay;
   var endDate = endYear + '-' + endMonth + '-' + endDay;

   $('#date').attr('min', startDate)
       .attr('max', endDate);
});

function check_text_field(field_id, regex) {
    var field = document.getElementById(field_id);
    return regex.test(field.value);
}

function checkBooking() {
    var ok = true;

    var first_name_regex = /^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ]{1,20}$/;
    var last_name_regex = /^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/;
    var mail_regex = /^[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ!#$%&'*+\-\/=?^_`{|}~.]+@[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ\-]+\.[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ\-.]+$/;
    var phone_regex = /^(\+[0-9]{2})?[0-9]{3}[-]?[0-9]{3}[-]?[0-9]{3}$/;

    var first_name_error = document.getElementById("first-name-error");
    if(!check_text_field("first-name", first_name_regex)) {
        ok = false;
        first_name_error.innerHTML = "Podane imię jest w niepoprawnym formacie";
    } else {
        first_name_error.innerHTML = "";
    }

    var last_name_error = document.getElementById("last-name-error");
    if(!check_text_field("last-name", last_name_regex)) {
        ok = false;
        last_name_error.innerHTML = "Podane nazwisko jest w niepoprawnym formacie";
    } else {
        last_name_error.innerHTML = "";
    }

    var mail_error = document.getElementById("mail-error");
    if(!check_text_field("mail", mail_regex)) {
        ok = false;
        mail_error.innerHTML = "Podany mail jest w niepoprawnym formacie";
    } else {
        mail_error.innerHTML = "";
    }

    var phone_error = document.getElementById("phone-error");
    if(!check_text_field("phone", phone_regex)) {
        ok = false;
        phone_error.innerHTML = "Podany numer jest w niepoprawnym formacie";
    } else {
        phone_error.innerHTML = "";
    }

    var people_error = document.getElementById("people-error");
    var number_of_people = document.getElementById("people").value;
    if(number_of_people < 1) {
        ok = false;
        people_error.innerHTML = "Podano nieprawidołową liczbę";
    } else if(number_of_people > 60) {
        ok = false;
        people_error.innerHTML = "Liczba osób nie może być większa od 60";
    } else {
        people_error.innerHTML = "";
    }

    var date_error = document.getElementById("date-error");
    if(!document.getElementById("date").value) {
        ok = false;
        date_error.innerHTML = "Nie podano daty";
    } else {
        date_error.innerHTML = "";
    }

    return ok;
}

function checkContact() {
    var ok = true;

    var first_last_name_regex = /^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ]{1,20} [A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/;
    var mail_regex = /^[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ!#$%&'*+\-\/=?^_`{|}~.]+@[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ\-]+\.[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ\-.]+$/;

    var first_name_error = document.getElementById("first-last-name-error");
    if(!check_text_field("first-last-name", first_last_name_regex)) {
        ok = false;
        first_name_error.innerHTML = "Podane imię lub nazwisko jest w niepoprawnym formacie";
    } else {
        first_name_error.innerHTML = "";
    }

    var mail_error = document.getElementById("mail-2-error");
    if(!check_text_field("mail-2", mail_regex)) {
        ok = false;
        mail_error.innerHTML = "Podany mail jest w niepoprawnym formacie";
    } else {
        mail_error.innerHTML = "";
    }

    var subject_error = document.getElementById("subject-error");
    if(document.getElementById("subject").value.replaceAll(' ', '').length < 3) {
        ok = false;
        subject_error.innerHTML = "Temet musi się składać z co najmniej 3 liter";
    } else {
        subject_error.innerHTML = "";
    }

    return ok;
}

function checkOrder() {
    var ok = true;

    var first_name_regex = /^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ]{1,20}$/;
    var last_name_regex = /^[A-ZĘĄŚŁŻŹĆŃÓ][ a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/;
    var mail_regex = /^[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ!#$%&'*+\-\/=?^_`{|}~.]+@[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ\-]+\.[a-zA-Z0-9ęąśłżźćńóĘĄŚŁŻŹĆŃÓ\-.]+$/;
    var phone_regex = /^(\+[0-9]{2})?[0-9]{3}[-]?[0-9]{3}[-]?[0-9]{3}$/;
    var street_regex = /^[0-9A-ZĘĄŚŁŻŹĆŃÓ][ 0-9a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/;
    var house_regex = /^\d{1,5}\w{0,4}$/;
    var flat_regex = /^[0-9]{0,3}$/;
    var postcode_regex = /^([0-9]{2}-[0-9]{3})|[0-9]{5}$/;
    var city_regex = /^[0-9A-ZĘĄŚŁŻŹĆŃÓ][ 0-9a-zA-ZęąśłżźćńóĘĄŚŁŻŹĆŃÓ-]{1,40}$/;

    var first_name_error = document.getElementById("first-name-error");
    if(!check_text_field("first-name", first_name_regex)) {
        ok = false;
        first_name_error.innerHTML = "Imię jest w niepoprawnym formacie";
    } else {
        first_name_error.innerHTML = "";
    }

    var last_name_error = document.getElementById("last-name-error");
    if(!check_text_field("last-name", last_name_regex)) {
        ok = false;
        last_name_error.innerHTML = "Nazwisko jest w niepoprawnym formacie";
    } else {
        last_name_error.innerHTML = "";
    }

    var mail_error = document.getElementById("mail-error");
    if(!check_text_field("mail", mail_regex)) {
        ok = false;
        mail_error.innerHTML = "Mail jest w niepoprawnym formacie";
    } else {
        mail_error.innerHTML = "";
    }

    var phone_error = document.getElementById("phone-error");
    if(!check_text_field("phone", phone_regex)) {
        ok = false;
        phone_error.innerHTML = "Numer jest w niepoprawnym formacie";
    } else {
        phone_error.innerHTML = "";
    }

    var street_error = document.getElementById("street-error");
    if(!check_text_field("street", street_regex)) {
        ok = false;
        street_error.innerHTML = "Ulica jest w pieprawidłowym formacie";
    } else {
        street_error.innerHTML = "";
    }

    var house_error = document.getElementById("house-error");
    if(!check_text_field("house", house_regex)) {
        ok = false;
        house_error.innerHTML = "Błędny numer";
    } else {
        house_error.innerHTML = "";
    }

    var flat_error = document.getElementById("flat-error");
    if(!check_text_field("flat", flat_regex)) {
        ok = false;
        flat_error.innerHTML = "Błędny numer";
    } else {
        flat_error.innerHTML = "";
    }

    var postcode_error = document.getElementById("postcode-error");
    if(!check_text_field("postcode", postcode_regex)) {
        ok = false;
        postcode_error.innerHTML = "Błędny kod pocztowy";
    } else {
        postcode_error.innerHTML = "";
    }

    var city_error = document.getElementById("city-error");
    if(!check_text_field("city", city_regex)) {
        ok = false;
        city_error.innerHTML = "Błędna nazwa miejscowości";
    } else {
        city_error.innerHTML = "";
    }


   return ok;
}

class Cart {
    constructor() {
        this.list = JSON.parse(localStorage.getItem('cart'));

        if(this.list == null) {
            this.list = [];
        }
        localStorage.setItem('cart', JSON.stringify(this.list));

        this.helper = new HTMLHelper();
    }

    getContentAsJSON() {
        return JSON.parse(localStorage.getItem('cart'));
    }

    saveAsJSON(id, name, quantity, price) {
        if(typeof(Storage) !== "undefined") {
            var list = this.getContentAsJSON();
            var item = {};
            item.id = id;
            item.name = name;
            item.quantity = parseInt(quantity);
            item.basePrice = parseFloat(price);
            item.price = item.basePrice * item.quantity;

            if(list === null) {
                list = [];
            }
            list.push(item);

            localStorage.setItem('cart', JSON.stringify(list));
            return true;
        } else {
            this.helper.sendNotification("error", "Twoja przeglądarka nie posiada localStorage", id);
        }
        return false;
    }

    isContent() {
        var list = this.getContentAsJSON();

        return !(list === null || list.length === 0);
    }

    isInCart(id) {
        if(!this.isContent()) {
            return false;
        }

        var cart = this.getContentAsJSON();
        for (var i = 0; i < cart.length; i++) {
            if(cart[i].id === id) {
                return true;
            }
        }
        return false;
    }

    incrementQuantity(id, quantity) {
        var cart = this.getContentAsJSON();

        for (var i = 0; i < cart.length; i++) {
            if(cart[i].id === id) {
                cart[i].quantity = parseInt(cart[i].quantity) + parseInt(quantity);
                if(cart[i].quantity <= 100) {
                    cart[i].price = cart[i].quantity * cart[i].basePrice;
                } else {
                    cart[i].quantity = parseInt(cart[i].quantity) - parseInt(quantity);
                    return false;
                }
            }
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        return true;
    }

    updateQuantity(tupleList) {
        var cart = this.getContentAsJSON();
        var ok = true;

        for (var i = 0; i < tupleList.length; i++) {
            for (var j = 0; j < cart.length; j++) {
                if(tupleList[i][0] === cart[j].id && tupleList[i][1] > 0 && tupleList[i][1] < 100) {
                    cart[j].quantity = tupleList[i][1];
                    cart[j].price = cart[j].basePrice * cart[j].quantity;
                    break;
                } else if(tupleList[i][1] <= 0 || tupleList[i][1] > 100) {
                    ok = false;
                }
            }
        }
        if(ok) {
            localStorage.setItem('cart', JSON.stringify(cart));
        }
        return ok;
    }

    addToCart(id) {
        if(id === null) {
            return false;
        }

        var item = document.getElementById(id);
        var name = item.children[1].children[0].textContent.replace(/\r?\n|\r|/g, "").trim();
        var quantity = item.children[1].children[2].children[0].children[0].value;
        var price = item.children[1].children[2].children[1].children[0].textContent
            .replace(/\r?\n|\r|[a-zA-ZąćęłńóśźżĄĆĘŁŃÓŚŹŻ]/g, "")
            .replace(/,/, ".")
            .trim();

        if(quantity > 0 && quantity < 100) {
            if(!this.isInCart(id)) {
                if(this.saveAsJSON(id, name, quantity, price)) {
                    this.helper.sendNotification("success", "Produkt został dodany do koszyka.", id);
                } else {
                    this.helper.sendNotification("error", "Twoja przeglądarka nie posiada local storage.", id);
                }
            } else {
                if(this.incrementQuantity(id, quantity)) {
                    this.helper.sendNotification("success", "Produkt został dodany do koszyka.", id);
                } else {
                    this.helper.sendNotification("error", "Nie można dodać więcej niż 99 produktów.", id);
                }
            }
        } else {
            this.helper.sendNotification("error", "Nie można dodać więcej niż 99 produktów.", id);
        }
    }

    deleteAll() {
        localStorage.clear();
    }

    delete(selected) {
        var cart = this.getContentAsJSON();

        for (var i = 0; i < selected.length; i++) {
            for (var j = 0; j < cart.length; j++) {
                if(selected[i].value === cart[j].id) {
                    cart.splice(j, 1);
                    break;
                }
            }
        }
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    calculateTotalPrice() {
        var cartContent = this.getContentAsJSON();
        var totalPrice = 0;

        for (var i = 0; i < cartContent.length; i++) {
            totalPrice += cartContent[i].price;
        }

        return totalPrice;
    }
}

class HTMLHelper {

    cartEmpty() {
        document.getElementById("cart").innerHTML =
            "<div class='row cart-empty'>" +
            "<h2>W twoim koszyku nie ma żadnych produktów!</h2>" +
            "</div>";
    }

    listCartContent(cart) {
        var cartContent = cart.getContentAsJSON();
        var cartDiv = document.getElementById("cart");
        var table = document.createElement("table");
        table.className = 'table cart-table align-middle';
        var content = "<table class=\"table cart-table align-middle\" id=\"cart-table\">";
        for (var i = 0; i < cartContent.length; i++) {
            content += this.createTableRow(cartContent[i]);
        }
        content +=
            "<tr>" +
            "<td class=\"cart-table-sum\" colspan=\"3\">Suma:</td>" +
            "<td class=\"cart-table-price\">" + cart.calculateTotalPrice().toFixed(2).replace(".", ",") + " zł</td>" +
            "</tr>" +
            "</table>" +
            "<div class=\"row\">" +
            "<div class=\"col-lg-3 col-md-6 col-sm-12\"><input id=\"deleteAllButton\" type=\"button\" class=\"form-control input-submit\" value=\"Usuń Wszystkie\"></div>" +
            "<div class=\"col-lg-3 col-md-6 col-sm-12\"><input id=\"deleteButton\" type=\"button\" class=\"form-control input-submit\" value=\"Usuń\"></div>" +
            "<div class=\"col-lg-3 col-md-6 col-sm-12\"> <input id=\"saveButton\" type=\"button\" class=\"form-control input-submit\" value=\"Zapisz\"></div>" +
            "<div class=\"col-lg-3 col-md-6 col-sm-12\"><input id=\"nextButton\" type=\"button\" class=\"form-control input-submit\" value=\"Kontynuj\" style=\"float: right\"></div>" +
            "</div>";

        cartDiv.innerHTML = content;
    }

    listOrderContent(cart) {
        var cartContent = cart.getContentAsJSON();
        var table = document.getElementById("order_content");
        var content = "";

        for (var i = 0; i < cartContent.length; i++) {
            content += this.createTableOrderRow(cartContent[i]);
        }

        content += "<tr>" +
            "<td class=\"cart-table-sum\" colspan=\"2\">Suma:</td>" +
            "<td class=\"cart-table-price\">" + cart.calculateTotalPrice().toFixed(2).replace(".", ",") + " zł</td>" +
            "</tr>";
        table.innerHTML = content;
    }

    createTableRow(content) {
        return " <tr>" +
            "<td class=\"cart-table-checkbox\"><input type=\"checkbox\" value=\""+ content.id +"\" class=\"cart-checkbox\"></td>" +
            "<td class=\"cart-table-name\">" + content.name + "</td>" +
            "<td class=\"cart-table-quantity\"><input type=\"number\" value=\"" + content.quantity + "\" class=\"cart-quantity\"></td>" +
            "<td class=\"cart-table-price\">" + content.price.toFixed(2).replace(".", ",") + " zł</td>" +
            "</tr>";
    }

    createTableOrderRow(content) {
        return "<tr>" +
            "<td class=\"cart-table-name\">" + content.name + "</td>" +
            "<td class=\"cart-table-quantity\"><input type=\"number\" min=\"1\" value=\"" + content.quantity + "\" disabled></td>" +
            "<td class=\"cart-table-price\">" + content.price.toFixed(2).replace(".", ",") + " zł</td>" +
            "</tr>";
    }

    orderCompleteSite() {
        window.scrollTo(0, 0);
        document.getElementById("order-container").innerHTML = "<h2 style=\"text-align: center; margin-top: 30px\">Zamówienie zostało złożone!</h2>" +
            "<button id=\"order-return\" class=\"form-control input-submit\" style=\"margin-top: 30px\" onclick=\"window.location.href='index.html'\">Powrót do strony głównej</button>";
    }

    getCheckCheckbox() {
        var checkboxes = document.getElementsByClassName("cart-checkbox");
        var checked = [];

        for (var i = 0; i < checkboxes.length; i++) {
            if(checkboxes[i].checked) {
                checked.push(checkboxes[i]);
            }
        }
        return checked;
    }

    getQuantity() {
        var tableRows = document.getElementById("cart-table").children[0];
        var tupleList = [];

        for (var i = 0; i < tableRows.children.length - 1; i++) {
            tupleList[i] = [
                tableRows.children[i].children[0].children[0].value,
                parseInt(tableRows.children[i].children[2].children[0].value)
            ];
        }
        return tupleList;
    }

    notification(type, text, notificationContainer) {
        notificationContainer.className = "notification notification-" + type;

        notificationContainer.children[0].textContent = text;
        notificationContainer.style.display = "block";
        notificationContainer.style.opacity = "1";

        notificationContainer.addEventListener('click', () => {
            notificationContainer.style.opacity = "0";
            setTimeout(function () {
                notificationContainer.style.display = "none";
            }, 500);
        });

        setTimeout(function () {
            notificationContainer.style.opacity = "0";
        }, 25000);

        setTimeout(function () {
            notificationContainer.style.display = "none";
        }, 30000);
    }

    notificationMenu(type, text, id) {
        var notificationContainer = document.getElementById(id).children[2];
        this.notification(type, text, notificationContainer);
    }

    notificationCart(type, text) {
        var notificationContainer = document.getElementById("cart-notification");
        this.notification(type, text, notificationContainer);
    }

    sendNotification(type, text, id) {
        if(window.location.pathname.endsWith("cart.html")) {
            this.notificationCart(type, text);
        } else if(window.location.pathname.endsWith("menu.html")) {
            this.notificationMenu(type, text, id);
        }
    }
}

class ServerBridge {

    send(json) {
        fetch('http://localhost/restauracja/server/api.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(json)
        }).then(response => {
            return response.json();
        })
            .then(data => console.log(data))
            .catch(error => console.log(error));
    }

    sendOrderToServer(cart) {
        var order = {
            "customer": {
                "personal-data": {
                    "first-name": document.getElementById("first-name").value,
                    "last-name": document.getElementById("last-name").value,
                    "mail": document.getElementById("mail").value,
                    "phone": document.getElementById("phone").value
                },
                "address": {
                    "postcode": document.getElementById("postcode").value.replace("-", ""),
                    "city": document.getElementById("city").value,
                    "street": document.getElementById("street").value,
                    "house-number": document.getElementById("house").value,
                    "flat-number": document.getElementById("flat").value,
                }
            },
            "additional-message": document.getElementById("note").value,
            "order": cart.getContentAsJSON()
        };
        this.send(order);
    }

    sentContactToServer() {
        var contact = {
            "person": {
                "first-last-name": document.getElementById("first-last-name").value,
                "mail": document.getElementById("mail-2").value,
            },
            "message": {
                "subject": document.getElementById("subject").value,
                "note": document.getElementById("note-2").value
            }
        };
        this.send(contact);
    }

    sendBookingToServer() {
        var booking = {
            "customer": {
                "first-name": document.getElementById("first-name").value,
                "last-name": document.getElementById("last-name").value,
                "phone": document.getElementById("phone").value,
                "mail": document.getElementById("mail").value
            },
            "booking": {
                "date": document.getElementById("date").value,
                "time": document.getElementById("time").value,
                "people": document.getElementById("people").value
            },
            "note": document.getElementById("note").value
        };
        this.send(booking);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    var cart = new Cart();
    var helper = new HTMLHelper();
    var serverBridge = new ServerBridge();

    if(window.location.href.endsWith('cart.html') && typeof(Storage) !== "undefined") {
        if(cart.isContent()) {
            helper.listCartContent(cart);

            document.getElementById("deleteAllButton").addEventListener('click', function () {
                cart.deleteAll();
                sessionStorage.setItem("notification", "success | Wszystkie przedmioty z koszyka zostały usunięte");
                location.reload();
            });

            document.getElementById("deleteButton").addEventListener('click', function () {
                cart.delete(helper.getCheckCheckbox());
                sessionStorage.setItem("notification", "success | Wybrane przedmioty zostały usunięte");
                location.reload();
            });

            document.getElementById("saveButton").addEventListener('click', function () {
                var check = cart.updateQuantity(helper.getQuantity());
                if(check) {
                    sessionStorage.setItem("notification", "success | Wybrane pozycje zostały edytowane");
                } else {
                    sessionStorage.setItem("notification", "error | Ilość produktów nie może być mniejsza od 1 oraz nie może być większa od 100");
                }
                location.reload();
            });

            document.getElementById("nextButton").addEventListener('click', () => {
                if(cart.isContent()) {
                    location.href = 'order.html';
                } else {
                    helper.sendNotification("error", "Twój koszyk jest pusty", null);
                }
            });

        } else {
            helper.cartEmpty();
        }
    }

    if(window.location.href.includes('menu.html')) {
        Array.from(document.getElementsByClassName('cart-button'))
            .forEach(function(button) {
                button.addEventListener('click', () => {
                    cart.addToCart(button.lastElementChild.id.slice(0, -2));
                });
            });
    }

    if(window.location.href.includes('order.html')) {
        helper.listOrderContent(cart);

        if(!cart.isContent()) {
            helper.orderCompleteSite();
        } else {
            document.getElementById("order-confirm").addEventListener("click", function () {
                if(checkOrder()) {
                    fetch('http://localhost/restauracja/server/postcodes.txt')
                        .then(response => response.text())
                        .then(textString => {
                            var postcodes = textString.split('\n');
                            for (let i = 0; i < postcodes.length; i++) {
                                postcodes[i] = postcodes[i].replace("\n", "").trim();
                            }

                            var postcode = document.getElementById("postcode").value
                                .replace("-", "")
                                .trim();
                            var ok = false;

                            for (let i = 0; i < postcodes.length; i++) {
                                if(postcodes[i] === postcode) {
                                    ok = true;
                                    break;
                                }
                            }

                            if(ok) {
                                serverBridge.sendOrderToServer(cart);
                                helper.orderCompleteSite();
                                cart.deleteAll();
                            } else {
                                helper.notification(
                                    "error",
                                    "Dostawa pod podany adres nie może być zrealizowama.",
                                    document.getElementById("order-notification")
                                );
                            }
                        })
                        .catch(error => console.log(error));
                }
            });
        }
    }

    if(window.location.href.includes('contact.html')) {
        document.getElementById("contact-send-button").addEventListener('click', function f() {
            if(checkContact()) {
                serverBridge.sentContactToServer();
                document.getElementById("contact-form").reset();
                helper.notification(
                    "success",
                    "Twoja wiadomość została przesłana.",
                    document.getElementById("contact-notification")
                );
            }
        });
    }

    if(window.location.href.includes("booking.html")) {
        document.getElementById("booking-submit-button").addEventListener('click', function () {
            if(checkBooking()) {
                serverBridge.sendBookingToServer();
                document.getElementById("booking-form").reset();
                helper.notification(
                    "success",
                    "Przesłano prośbę o rezerwację. Niedługo otrzymasz informację zwrotną.",
                    document.getElementById("booking-notification")
                );
            }
        });
    }

    window.onload = function () {
        if(typeof(Storage) !== "undefined" && window.location.href.includes("cart.html")) {
            var notification = sessionStorage.getItem("notification");
            if(notification !== "" && notification !== null) {
                sessionStorage.setItem("notification", "");
                var arr = notification.split(" | ");
                helper.sendNotification(arr[0], arr[1], null);
            }
        }
    };

    if(window.location.href.includes("game.html")) {
        document.getElementById("play").addEventListener('click', function () {
            fetch('http://localhost/restauracja/server/gameHTML')
                .then(response => {
                    return response.text();
                })
                .then(data => {
                    document.getElementById("game-main").innerHTML = data;
                })
                .catch(error => console.log(error));

            fetch('http://localhost/restauracja/server/gameCSS')
                .then(response => {
                    return response.text();
                })
                .then(data => {
                    var style = document.createElement('style');
                    style.innerHTML = data;
                    document.getElementsByTagName("head").item(0).appendChild(style);
                })
                .catch(error => console.log(error));

            fetch('http://localhost/restauracja/server/gameJS')
                .then(response => {
                    return response.text();
                })
                .then(data => {
                    var script = document.createElement('script');
                    script.innerHTML = data;
                    document.getElementsByTagName("body").item(0).appendChild(script);
                })
                .catch(error => console.log(error));
        });
    }
});
