<ul class="list-group list-group-flush">
    <?php if( $square = get_field( 'square' ) ): ?>
        <li class="list-group-item">Площадь: <?php echo $square ?></li>
    <?php endif; ?>
    <?php if( $price = get_field( 'price' ) ): ?>
        <li class="list-group-item">Стоимость: <?php echo $price ?></li>
    <?php endif; ?>
    <?php if( $living_space = get_field( 'living_space' ) ): ?>
        <li class="list-group-item">Жилая площадь: <?php echo $living_space ?></li>
    <?php endif; ?>
    <?php if( $floor = get_field( 'floor' ) ): ?>
        <li class="list-group-item">Этаж: <?php echo $floor ?></li>
    <?php endif; ?>
    <?php if( $address = get_field( 'address' ) ): ?>
        <li class="list-group-item">Адрес: <?php echo $address; ?></li>
    <?php endif; ?>
</ul>