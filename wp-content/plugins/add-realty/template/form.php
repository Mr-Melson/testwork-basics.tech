<div class="col-md-8">
    <div class="create_realty_form">
        <h1>Создание недвижимости</h1>
        <form id="add_realty">
            <div class="row mt-5">
                <div class="col-md-6 mb-3">
                    <label for="realty_name">Название недвижимости</label>
                    <p>
                        <input id="realty_name" name="realty_name" type="text" value="" placeholder="Название">
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="square">Площадь недвижимости</label>
                    <p>
                        <input id="square" name="square" type="number" value="" placeholder="Площадь" min=1 step="0,01">
                    </p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="price">Стоимость недвижимости</label>
                    <p>
                        <input id="price" name="price" type="number" value="" placeholder="Цена" min=0 step="0,01">
                    </p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="living_space">Жилая площадь недвижимости</label>
                    <p>
                        <input id="living_space" name="living_space" type="number" value="" placeholder="Жилая площадь" min=1 step="0,01">
                    </p>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="floor">Этаж недвижимости</label>
                    <p>
                        <input id="floor" name="floor" type="number" value="" placeholder="Этаж" min=1>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="adress_create">Адрес</label>
                    <p>
                        <input id="adress_create" name="adress_create" type="date" value="" placeholder="Адрес">
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="type_of_realty">Тип недвижимости</label>
                    <p>
                        <select id="type_of_realty" name="type_of_realty">
                            <option default="" disabled="" selected="" hidden=""></option>
                            <?php
                            $terms = get_terms('type', 'orderby=count&hide_empty=0');
                            if( $terms ) {
                                foreach ($terms as $term) {
                                    echo "<option value='" . $term->slug . "'>" . $term->name . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </p>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="town_of_realty">Город недвижимости</label>
                    <p>
                        <select id="town_of_realty" name="town_of_realty">
                            <option default="" disabled="" selected="" hidden=""></option>
                            <?php
                            $towns = get_posts(array('post_type' => 'town', 'posts_per_page' => -1));
                            if ($towns) {
                                foreach ($towns as $town) {
                                    echo "<option value='" . $town->ID . "'>" . $town->post_title . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </p>
                </div>

                <div class="col-12 mb-3">
                    <label for="thumb_of_realty">Изображение недвижимости</label>
                    <p>
                        <input id="thumb_of_realty" type="file" name="thumb_of_realty" placeholder="Выберите файл" accept=".jpeg,.png,.jpg">
                    </p>
                </div>
                <div class="col-12 mb-3">
                    <input id="create_realty" type="submit" value="Создать">
                </div>
                <div class="col-12 mb-3">
                    <div id="result"></div>
                </div>
            </div>
        </form>
    </div>
</div>
