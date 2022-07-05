<div id="comments">
    <section id="comments-list" class="comments">
        <div class="col-lg-12">
            <h2 class="comments-title"><?php comments_number(); ?></h2>
            <ul>
                <li>
                    <?php wp_list_comments('type=comment'); ?>
                </li>
            </ul>

        </div>
    </section>
    <?php
    if (comments_open()) {
        comment_form();
    }
    ?>
</div>