
export class Shop {
    init() {
        this.ShopFilter();
    }

    ShopFilter() {
        $(document).ready(function ($) {
            function loadProducts(page, category, replace = false) {
                $.ajax({
                    url: ajax_params.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'load_more_products',
                        page: page,
                        category: category,
                    },
                    success: function (response) {
                        if (replace) {
                            $('#product-list').html(response.html);
                        } else {
                            $('#product-list').append(response.html);
                        }

                        $('#load-more-products').data('page', page + 1).data('category', category);

                        if (!response.has_more) {
                            $('#load-more-wrapper').hide();
                        } else {
                            $('#load-more-wrapper').show();
                        }
                    }
                });
            }

            $('#load-more-products').on('click', function () {
                const page = $(this).data('page');
                const category = $(this).data('category');
                loadProducts(page, category);
            });

            $('#category-filter').on('click', '.product-filter-btn', function () {
                const category = $(this).data('category');
                $('.product-filter-btn').removeClass('active');
                $(this).addClass('active');

                $('#load-more-products').data('page', 2).data('category', category);
                loadProducts(1, category, true);
            });

        });

    }
}