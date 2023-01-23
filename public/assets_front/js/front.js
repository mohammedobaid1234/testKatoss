$.get($("meta[name='BASE_URL']").attr("content") + '/admin/sections', {}, function (response, status) {
    $('.header-content').prepend(response.data[0].body);
    $('.header-image img').attr('src',response.data[0].image_url);

    $('.about-five-content').prepend(response.data[1].body);
    $('.about-image-five img').attr('src',response.data[1].image_url);

    $('.services-section').prepend(response.data[2].body);
    $('.news-section').prepend(response.data[3].body);
});

$.get($("meta[name='BASE_URL']").attr("content") + '/admin/settings', {}, function (response, status) {
    $('#nav-who').prepend(response.data.who_are);
    $('#nav-vision').prepend(response.data.our_vision);
    $('#nav-history').prepend(response.data.our_history);
    $('.phone_contact').prepend(response.data.mobile_no);
    $('.email_contact').prepend(response.data.email);
    $('.Schedule').prepend(response.data.Schedule);
    $('.address').prepend(response.data.address);
    $('.footer-widget').prepend(response.data.copy_right);
});


$.get($("meta[name='BASE_URL']").attr("content") + '/admin/services', {}, function (response, status) {
    $('.service-content').each(function(i, obj) {
        $(this).prepend(response.data[i].body);
    });
});

$.get($("meta[name='BASE_URL']").attr("content") + '/admin/news', {}, function (response, status) {
    let result = Array.from(response.data);
    result.forEach(element => {
        $('.list-news').append(`
        <div class="col-lg-4 col-md-6 col-12">
          <!-- Single News -->
          <div class="single-news">
            <div class="image">
              <a href="javascript:void(0)"><img class="thumb" src="${element.image_url}" alt="Blog" /></a>
              <div class="meta-details">
                <img class="thumb" src="${element.user_image_url}" alt="Author" />
                <span>
                ${element.user_name}
                </span>
              </div>
            </div>
            <div class="content-body">
              <h4 class="title">
                <a href="javascript:void(0)"> 
                ${element.label}
                </a>
              </h4>
              ${element.body}
            </div>
          </div>
          <!-- End Single News -->
        </div>
        `);
    });
});

