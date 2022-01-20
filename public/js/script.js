
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
