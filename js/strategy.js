// import $ from 'jquery';

const howitWorks = {
    init() {
        const $links = jQuery("ul.strategy-links > li > a");
        const $firstLink = $links.first();
        const $firstP = $firstLink.find("p").first();

        if (!$firstLink.length) return;

        // Set first item active
        $firstLink.addClass("active");
        $firstP.css("max-height", $firstP[0].scrollHeight + "px");

        // Click handler
        $links.on("click", function (e) {
            e.preventDefault();
            const $target = $(this);

            // remove all actives
            $links.removeClass("active");
            $links.each(function () {
                const $link = $(this);
                $link.find("p").css("max-height", 0);
            });

            // activate clicked
            $target.addClass("active");

            // expand p inside clicked link
            const $pInside = $target.find("p").first();
            $pInside.css("max-height", $pInside[0].scrollHeight + "px");

            // handle rows show/hide
            const n = $target.data("name");
            const $rows = $(".strategy-row");
            const $rowsToShow = $rows.filter(`[data-value="${n}"]`);

            $rows.hide();
            $rowsToShow.fadeIn(800);
        });
    },
};

howitWorks.init();
