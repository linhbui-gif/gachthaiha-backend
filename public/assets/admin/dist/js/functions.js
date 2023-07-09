$(document).ready(function($) {
    $.fn.datepicker.dates['vi'] = {
        days: ["C.Nhật", "T.Hai", "T.Ba", "T.Tư", "T.Năm", "T.Sáu", "T.Bảy"],
        daysShort: ["C.N", "T.2", "T.3", "T.4", "T.5", "T..6", "T.7"],
        daysMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
        months: ["T.1", "T.2", "T.3", "T.4", "T.5", "T.6", "T.7", "T.8", "T.9", "T.10", "T.11", "T.12"],
        monthsShort: ["T.1", "T.2", "T.3", "T.4", "T.5", "T.6", "T.7", "T.8", "T.9", "T.10", "T.11", "T.12"],
        today: "Hôm nay",
        clear: "Xóa",
        format: "mm/dd/yyyy",
        titleFormat: "MM yyyy",
        /* Leverages same syntax as 'format' */
        weekStart: 0
    };

    $('input[type=checkbox], input[type=radio]').not('.disallow_icheck').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('input').attr('autocomplete', 'off');

    $(document).on('icheck', function() {
        $('input[type=checkbox], input[type=radio]').not('.disallow_icheck').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue'
        });
    }).trigger('icheck'); // trigger it for page load

    $('[data-toggle=tooltip]').tooltip();

    /**
     * Set Prototype for money format
     * @param c
     * @param d
     * @param t
     * @returns {string}
     */
    Number.prototype.formatMoney = function(c, d, t) {
        var n = this,
            c = isNaN(c = Math.abs(c)) ? 2 : c,
            d = d == undefined ? "." : d,
            t = t == undefined ? "," : t,
            s = n < 0 ? "-" : "",
            i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
            j = (j = i.length) > 3 ? j % 3 : 0;
        return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    };

    $(document).on('keyup', '.input_money', function() {
        var number = $(this).val();
        number = number.replace(/,/g, "");
        if (number.toString().length === 22) {
            showNotify('error', "Số bạn nhập vào quá lớn, số sẽ tự động quay về 1!");
        }
        var number_format = parseFloat(number);
        $(this).val(number_format.formatMoney(0, 3, ','));
    });

    // set date picker
    if ($('.datepicker').length) {
        $('.datepicker').datepicker({
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            language: 'vi'
        });
    }

    if ($('.time_picker').length) {
        $('.time_picker').timepicker({
            showInputs: false,
            showMeridian: false,
            language: 'vi'
        });
    }

    if ($('.month_picker').length) {
        $('.month_picker').datepicker({
            autoclose: true,
            format: "yyyy-mm",
            viewMode: "months",
            minViewMode: "months",
            language: 'vi'
        });
    }

    if ($('.colorpicker').length) {
        $('.colorpicker').colorpicker();
    }

    if ($('#input_editor').length) {
        CKEDITOR.replace('input_editor');
    }

    // set select2
    if ($('.select2').length) {
        $('.select2').select2({
            matcher: function(params, data) {
                // If there are no search terms, return all of the data
                if (jQuery.trim(params.term) === '') {
                    return data;
                }
                var myTerm = replaceUtf8Character(jQuery.trim(params.term));
                var text = replaceUtf8Character(data.text);
                // `params.term` should be the term that is used for searching
                // `data.text` is the text that is displayed for the data object
                if (text.indexOf(myTerm) > -1) {
                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return data;
                }

                // Return `null` if the term should not be displayed
                return null;
            }
        });
    }


    $(document).on('ifClicked', '.form_check_all', function() {
        if (!this.checked) {
            $('.form_check_one').iCheck('check');
        } else {
            $('.form_check_one').iCheck('uncheck');
        }
    });

    $(document).on('ifClicked', '.form_check_one', function(event) {
        if (!this.checked) {
            if ($('.form_check_one').filter(':checked').length == $('.form_check_one').length - 1) {
                $('.form_check_all').iCheck('check');
            } else {
                $('.form_check_all').iCheck('uncheck');
            }
        } else {
            $('.form_check_all').iCheck('uncheck');
        }
    });

    $(document).on('click', '.show_description_tab', function() {
        var TYPE = $(this).attr('data-type');
        $(this).parent().parent().find('.description_tab_content').hide();
        $(this).parent().parent().find('.description_tab_' + TYPE).show();
    });


    $(document).on('change', '.generate_alias', function () {
        var str = $(this).val();
        var render = $(this).attr('data-render');
        str= str.toLowerCase();
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str= str.replace(/đ/g,"d");
        str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
        str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
        if($('.'+render).val() == ''){
            $('.'+render).val(str);
        }
    });


    $('.btn_choose_avatar').click(function () {
        CKFinder.popup( {
            chooseFiles: true,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var url = file.getUrl();
                    $('.input_avatar').val(url);
                    $('.img_avatar').attr('src', url);
                    $('.avatar_container').removeClass('hide');
                    $('.btn_delete_avatar').removeClass('hide');
                    $('.btn_choose_avatar').addClass('hide');
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var url = evt.data.resizedUrl;
                    $('.input_avatar').val(url);
                    $('.img_avatar').attr('src', url);
                    $('.avatar_container').removeClass('hide');
                    $('.btn_delete_avatar').removeClass('hide');
                    $('.btn_choose_avatar').addClass('hide');
                } );
            }
        } );
    });

    $('.btn_delete_avatar').click(function () {
        $('.input_avatar').val('');
        $('.img_avatar').attr('src', '');
        $('.avatar_container').addClass('hide');
        $('.btn_delete_avatar').addClass('hide');
        $('.btn_choose_avatar').removeClass('hide');
    });


});

function showPreload() {
    $('.overlay').removeClass('hide');
}

function hidePreload() {
    $('.overlay').addClass('hide');
}

function showNotify(status, message) {
    var key = 'class_' + Math.random().toString(36).substring(7);
    var html = '<div class="show_notify alert alert-' + status + ' alert-dismissible alert-auto-hide ' + key + '">';
    html += '    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
    html += '<h4><i class="icon fa fa-check"></i> Thông báo!</h4>';
    html += '<div class="progress_notify"><div class="progress_notify_percent"></div></div>';
    html += message;
    html += '</div>';
    $('.message_notify').prepend(html);

    var count = 0;
    var interval = setInterval(function() {
        count++;
        var percent = count / 2;
        if (percent >= 100) {
            percent = 100;
        }
        $('.' + key + ' .progress_notify_percent').css({
            width: percent + '%'
        });
        if (count > 200) {
            clearInterval(interval);
            $('.' + key).fadeOut(1000);
            setTimeout(function() {
                $('.' + key).remove();
            }, 1000);
        }
    }, 25);
}


function showAjaxError(error) {
    var message = '';
    if(typeof error.responseJSON != "undefined" && typeof error.responseJSON.errors != "undefined"){
        $.each(error.responseJSON.errors, function(key, value){
            message += value[0];

            key = key.replace(/\./g, '_');
            if($('.validation_' + key).length){
                $('.validation_' + key).text(value[0]);
                $('.validation_' + key).removeClass('hide');
            }
        });

    }else{
        message += 'Có lỗi trong quá trình xử lý. Mời bạn thử lại sau';
    }
    showNotify('error', message);
}


function selectFileWithCKFinder( elementId ) {
    CKFinder.popup( {
        chooseFiles: true,
        /*width: 800,
        height: 600,*/
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                var output = document.getElementById( elementId );
                output.value = file.getUrl();
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
                var output = document.getElementById( elementId );
                output.value = evt.data.resizedUrl;
            } );
        }
    } );
}


/********** CHART COMMON ****************/
/**
 * Function show pie chart
 * @param ELEMENT
 * @param TITLE
 * @param DATA
 */
function showPieChart(ELEMENT, TITLE, DATA) {
    Highcharts.chart(ELEMENT, {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: TITLE
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br/>Số lượng: <b>{point.y}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Tỷ lệ',
            colorByPoint: true,
            data: DATA
        }]
    });
}

/**
 * Function show line chart
 * @param ELEMENT
 * @param TITLE
 * @param CATEGORY
 * @param DATA
 */
function showLineChart(ELEMENT, TITLE, CATEGORY, DATA) {
    var legend = {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    };
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        legend = {};
    }

    Highcharts.chart(ELEMENT, {
        chart: {
            type: 'spline'
        },
        title: {
            text: TITLE
        },

        subtitle: {
            text: TITLE
        },
        xAxis: {
            categories: CATEGORY
        },
        yAxis: {
            title: {
                text: trans('revenue')
            },
            plotLines: [{
                value: 0,
                color: '#ff0000',
                width: 2,
                zIndex: 2,
                label: {
                    text: '0'
                }
            }]
        },
        legend: legend,
        tooltip: {
            formatter: function() {
                var s = '<strong>' + this.x + '</strong>';

                var sortedPoints = this.points.sort(function(a, b) {
                    return ((a.y > b.y) ? -1 : ((a.y < b.y) ? 1 : 0));
                });
                console.log(this.points);
                $.each(sortedPoints, function(i, point) {
                    s += '<br/><tspan style="color: ' + point.color + '">● ' + point.series.name + ':</tspan> <strong>' + point.y.formatMoney(0, 3, ',') + '</strong>';
                });

                return s;
            },
            crosshairs: true,
            shared: true
        },
        plotOptions: {
            spline: {
                marker: {
                    radius: 4,
                    lineColor: '#666666',
                    lineWidth: 1
                }
            }
        },
        series: DATA

    });
}


function replaceUtf8Character(str) {
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    return str;
}

/**
 * Handle drag & drop files for the upload form
 * @author Juno_okyo <junookyo@gmail.com>
 */
function dropzone(el, callback) {
    $(el).on('dragover dragenter', function(e) {
        e.preventDefault();
        e.stopPropagation();
    }).on('drop', function(e) {
        if (e.originalEvent.dataTransfer && e.originalEvent.dataTransfer.files.length) {
            e.preventDefault();
            e.stopPropagation();

            // start upload
            callback(e.originalEvent.dataTransfer.files[0]);
        }
    }).on('click', function(e) {
        $('input[type="file"].dropzone').click();
    });
}