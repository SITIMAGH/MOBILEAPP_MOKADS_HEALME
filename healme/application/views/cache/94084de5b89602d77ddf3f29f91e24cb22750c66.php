

<?php $__env->startSection('title', 'Market'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-3">
    <div class="slider">
        <div id="carouselSlider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($i == 0 ? 'active' : ''); ?>" data-toggle="modal" data-target="#modalSlider"
                    onclick="onDesc('<?php echo e($item->title); ?>', '<?php echo e(base64_encode($item->description)); ?>')">
                    <img src="<?php echo e(base_url() . 'files/sliders/' . $item->image); ?>" class="d-block w-100" alt="...">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselSlider" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselSlider" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
</div>
<div class="col-12 mb-3">
    <span class="btn btn-sm btn-secondary btn-curve w-100 mt-2">
<a href="https://time.is/WIB" id="time_is_link" rel="nofollow" style="font-size:11px"></a>
<span id="WIB_z41c" style="font-size:11px"></span>
<script src="//widget.time.is/t.js"></script>
<script>
time_is_widget.init({WIB_z41c:{}});
</script>
</span>
</div>
<div class="row">
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($item->stock != null): ?>
    <div class="col-12 mb-3">
        <div class="card product">
            <div class="card-body">
                
                <div class="row">
                    <div class="col-6">
                        <img src="<?php echo e(base_url()); ?>files/products/<?php echo e($item->image); ?>" class="card-img-top img-fluid"
                            alt="<?php echo e($item->name); ?>">
                        <input type="hidden" id="start_time-<?php echo e($item->variant); ?>"
                            value="<?php echo e(explode('-', $item->time_sale)[0]); ?>">
                        <input type="hidden" id="end_time-<?php echo e($item->variant); ?>"
                            value="<?php echo e(explode('-', $item->time_sale)[1]); ?>">
                        <input type="hidden" id="fee_booking-<?php echo e($item->variant); ?>"
                            value="<?php echo e(explode('/', $item->nominal_charge)[0]); ?>">
                        <input type="hidden" id="fee_buy-<?php echo e($item->variant); ?>"
                            value="<?php echo e(explode('/', $item->nominal_charge)[1]); ?>">
                    </div>
                    <div class="col-6 text-center">
                        <h6 class="text-truncate" title="<?php echo e(strtoupper($item->name)); ?>"><?php echo e(strtoupper($item->name)); ?></h6>
                        
                        <?php if(($item->stock - $item->stockOrder) == 0 || ($item->statusOrder != null)): ?>
                        <span class="btn btn-sm btn-secondary btn-curve w-100 mt-2">Full Booked</span>
                        <?php else: ?>
                        
                        <button
                            class="btn btn-sm btn-danger btn-curve w-100 mt-2 <?php echo e($item->end_booking != null && $item->end_booking != '0000-00-00 00:00:00' ? 'd-none' : ''); ?> <?php echo e((strtotime(date('H:i:s')) >= strtotime(explode('-', $item->time_sale)[0] . ':00') && strtotime(date('H:i:s')) <= strtotime(explode('-', $item->time_sale)[1] . ':00')) ? 'd-none' : ''); ?>"
                            id="<?php echo e('btn-booking-' . $item->variant); ?>"
                            onclick="onBookingStatistik('<?php echo e($item->variant); ?>')">Booking</button>
                        <button
                            class="btn btn-sm btn-success btn-curve w-100 mt-2 <?php echo e((strtotime(date('H:i:s')) >= strtotime(explode('-', $item->time_sale)[0] . ':00') && strtotime(date('H:i:s')) <= strtotime(explode('-', $item->time_sale)[1] . ':00')) ? '' : 'd-none'); ?>"
                            id="<?php echo e('btn-buy-' . $item->variant); ?>" onclick="('<?php echo e($item->variant); ?>')">Beli</button>
                        <span
                            class="btn btn-sm btn-warning btn-curve w-100 mt-2 <?php echo e($item->end_booking != null && $item->end_booking != '0000-00-00 00:00:00' ? '' : 'd-none'); ?> <?php echo e((strtotime(date('H:i:s')) >= strtotime(explode('-', $item->time_sale)[0] . ':00') && strtotime(date('H:i:s')) <= strtotime(explode('-', $item->time_sale)[1] . ':00')) ? 'd-none' : ''); ?>"
                            id="<?php echo e('btn-pesan-' . $item->variant); ?>">Booked</span>
                        <?php endif; ?>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-6">
                        <div class="product-rule">
                            <i class="bi bi-clock"></i>
                            <span><?php echo e($item->time_sale); ?></span>
                        </div>
                        <div class="product-rule">
                            <i class="bi bi-cash-stack"></i>
                            <span><?php echo e(number_format(explode('-', $item->nominal_minmax)[0]) . '-' .
                                number_format(explode('-', $item->nominal_minmax)[1])); ?></span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="product-rule">
                            <i class="bi bi-calendar2"></i>
                            <span><?php echo e(explode('/', $item->persen_per_day)[1] . 'Hari/' . explode('/',
                                $item->persen_per_day)[0] . '%'); ?></span>
                        </div>
                        <div class="product-rule">
                            <i class="bi bi-bookmark"></i>
                            <span><?php echo e(number_format(explode('/', $item->nominal_charge)[0]) . '/' .
                                number_format(explode('/', $item->nominal_charge)[1])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="modal fade" id="modalSlider" tabindex="-1" aria-labelledby="modalSliderLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSliderLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="sliderContent"></p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
    // const data = '<?php echo e(base64_encode(json_encode($data))); ?>';
    // $.each(JSON.parse(atob(data)), (index, item) => {
    //     if(item.end_booking != null){
    //         CD(item.end_booking, 'btn-pesan-' + item.variant);
    //     }
    // })
    // =======

    // function onPesan(variant){
    //     // if(Date.parse(`<?php echo e(date('Y-m-d H:i:s')); ?>`) > Date.parse(`<?php echo e(date('Y-m-d')); ?> ${$('#end_time-' + variant).val()}:00`)){
    //     //     booking(variant, 'booking', $('#fee_booking-' + variant).val(), `<?php echo e(date('Y-m-d', strtotime(date('Y-m-d') . '+1 days'))); ?> ` + $('#start_time-' + variant).val() + ':00')
    //     //     .then(res => {
    //     //         if(res.data.status == 200){
    //     //             Swal.fire({
    //     //                 icon: 'success',
    //     //                 title: res.data.msg,
    //     //                 showConfirmButton: false,
    //     //                 timer: 1500
    //     //             })
    //     //             $('#btn-booking-' + variant).addClass('d-none');
    //     //             $('#btn-pesan-' + variant).removeClass('d-none').removeClass('d-none');
    //     //             CD(`<?php echo e(date('Y-m-d', strtotime(date('Y-m-d') . '+1 days'))); ?> ` + $('#start_time-' + variant).val() + ':00', 'btn-pesan-' + variant);
    //     //         }else{
    //     //             Swal.fire({
    //     //                 icon: 'error',
    //     //                 html: res.data.msg,
    //     //             })
    //     //         }
    //     //     })
    //     //     .catch(err => {
    //     //         alert(JSON.stringify(err));
    //     //     });                
            
    //     // }else{
    //     //     booking(variant, 'booking', $('#fee_booking-' + variant).val(), `<?php echo e(date('Y-m-d')); ?> ` + $('#start_time-' + variant).val() + ':00')
    //     //     .then(res => {
    //     //         if(res.data.status == 200){
    //     //             Swal.fire({
    //     //                 icon: 'success',
    //     //                 title: res.data.msg,
    //     //                 showConfirmButton: false,
    //     //                 timer: 1500
    //     //             })
    //     //             $('#btn-booking-' + variant).addClass('d-none');
    //     //             $('#btn-pesan-' + variant).removeClass('d-none').removeClass('d-none');
    //     //             CD(`<?php echo e(date('Y-m-d')); ?> ` + $('#start_time-' + variant).val() + ':00', 'btn-pesan-' + variant);
    //     //         }else{
    //     //             Swal.fire({
    //     //                 icon: 'error',
    //     //                 html: res.data.msg,
    //     //             })
    //     //         }
    //     //     })
    //     //     .catch(err => {
    //     //         alert(JSON.stringify(err));
    //     //     });
    //     // }
    //     $('#btn-booking-' + variant).addClass('d-none');
    //     $('#btn-pesan-' + variant).removeClass('d-none').removeClass('d-none');
    // }

    function CD(date, id){
        var countDownDate = new Date(date).getTime();
        var x = setInterval(function() {

        var now = new Date().getTime();
            
        var distance = countDownDate - now;
            
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // document.getElementById(id).innerHTML = days + "d " + hours + "h "
        // + minutes + "m " + seconds + "s " + " => " + distance;
        if(distance <= 51000){
            document.getElementById(id).innerHTML = seconds + " detik";
        }
        
        if (distance < 0) {
            clearInterval(x);
            document.getElementById(id).innerHTML = "Booked";
            $('#' + id).addClass('d-none');
            $('#' + id.replace('pesan', 'buy')).removeClass('d-none');
            // $('#' + id.replace('pesan', 'booking')).addClass('d-none');
            // acc_booking(id.split('-')[2]);
        }
        }, 1000);
    }

    function booking(variant, type, fee, exp_booking){
        return new Promise((resolve, reject) => {
            const formData = new FormData();
            formData.append('type', type);
            formData.append('fee', fee);
            formData.append('exp_booking', exp_booking);
            formData.append('variant', variant);

            axios.post('<?php echo e(base_url()); ?>market/booking', formData)
            .then(res => {
                // alert(JSON.stringify(res));
                resolve(res);
            })
            .catch(err => {
                // alert(JSON.stringify(err));
                reject(err);
            });
        });
    }

    function acc_booking(variant){
        axios.get('<?php echo e(base_url()); ?>market/acc_booking/' + variant)
        .then(res => {
            // alert(JSON.stringify(res));
            if(res.data.status == 200){
                Swal.fire({
                    icon: 'success',
                    title: res.data.msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location = `<?php echo e(base_url()); ?>transactionhistory/buy`;
                })
            }else{
                // Swal.fire({
                //     icon: 'error',
                //     title: res.data.msg,
                //     showConfirmButton: false,
                //     timer: 1500
                // })
                Swal.fire({
                    icon: 'error',
                    title: res.data.msg,
                })
            }
        })
        .catch(err => {
            alert(JSON.stringify(err));
        });
    }

    function onBuy(variant){
        const formData = new FormData();
        formData.append('variant', variant);
        formData.append('fee', $('#fee_buy-' + variant).val());

        axios.post('<?php echo e(base_url()); ?>market/buy', formData)
        .then(res => {
            // alert(JSON.stringify(res.data));
            if(res.data.status == 200){
                Swal.fire({
                    icon: 'success',
                    title: res.data.msg,
                    showConfirmButton: false,
                    timer: 1500
                }).then((result) => {
                    window.location = `<?php echo e(base_url()); ?>transactionhistory/buy`;
                })
            }else{
                // Swal.fire({
                //     icon: 'error',
                //     title: res.data.msg,
                //     showConfirmButton: false,
                //     timer: 1500
                // })
                Swal.fire({
                    icon: 'error',
                    title: res.data.msg,
                })
            }
        })
        .catch(err => {
            alert(JSON.stringify(err));
        });
    }

    // function alert(type, msg){
    //     switch(type){
    //         case "200":
    //             Swal.fire({
    //                 icon: 'success',
    //                 title: msg,
    //                 showConfirmButton: false,
    //                 timer: 1500
    //             })
    //             break;
    //         case "404":
    //             Swal.fire({
    //                 icon: 'error',
    //                 title: msg,
    //                 showConfirmButton: false,
    //                 timer: 1500
    //             })
    //             break;
    //     }
    // }

    function onDesc(title, desc){
            $('#modalSliderLabel').text(title);
            $('#sliderContent').html(atob(desc));
        }

    function onBookingStatistik(variant){
        if(Date.parse(`<?php echo e(date('Y-m-d H:i:s')); ?>`) > Date.parse(`<?php echo e(date('Y-m-d')); ?> ${$('#end_time-' + variant).val()}:00`)){
            booking_statistik(variant, 'booking', $('#fee_booking-' + variant).val(), `<?php echo e(date('Y-m-d', strtotime(date('Y-m-d') . '+1 days'))); ?> ` + $('#start_time-' + variant).val() + ':00')
            .then(res => {
                if(res.data.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: res.data.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#btn-booking-' + variant).addClass('d-none');
                    $('#btn-pesan-' + variant).removeClass('d-none').removeClass('d-none');
                    // CD(`<?php echo e(date('Y-m-d', strtotime(date('Y-m-d') . '+1 days'))); ?> ` + $('#start_time-' + variant).val() + ':00', 'btn-pesan-' + variant);
                }else{
                    Swal.fire({
                        icon: 'error',
                        html: res.data.msg,
                    })
                }
            })
            .catch(err => {
                alert(JSON.stringify(err));
            });                
            
        }else{
            booking_statistik(variant, 'booking', $('#fee_booking-' + variant).val(), `<?php echo e(date('Y-m-d')); ?> ` + $('#start_time-' + variant).val() + ':00')
            .then(res => {
                if(res.data.status == 200){
                    Swal.fire({
                        icon: 'success',
                        title: res.data.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $('#btn-booking-' + variant).addClass('d-none');
                    $('#btn-pesan-' + variant).removeClass('d-none').removeClass('d-none');
                    // CD(`<?php echo e(date('Y-m-d')); ?> ` + $('#start_time-' + variant).val() + ':00', 'btn-pesan-' + variant);
                }else{
                    Swal.fire({
                        icon: 'error',
                        html: res.data.msg,
                    })
                }
            })
            .catch(err => {
                alert(JSON.stringify(err));
            });
        }
    }

    function booking_statistik(variant, type, fee, exp_booking){
        return new Promise((resolve, reject) => {
            const formData = new FormData();
            formData.append('type', type);
            formData.append('fee', fee);
            formData.append('exp_booking', exp_booking);
            formData.append('variant', variant);

            axios.post('<?php echo e(base_url()); ?>market/booking_statistik', formData)
            .then(res => {
                // alert(JSON.stringify(res));
                resolve(res);
            })
            .catch(err => {
                // alert(JSON.stringify(err));
                reject(err);
            });
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\newxampp2\htdocs\moneygame\application\views/market.blade.php ENDPATH**/ ?>