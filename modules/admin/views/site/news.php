<?php

use kartik\detail\DetailView;






echo DetailView::widget([
    'model'=>$new,
    'condensed'=>true,
    'hover'=>true,
    'mode'=>DetailView::MODE_VIEW,
    'panel'=>[
        'heading'=>'Book # ' . $new->id,
    ],
    'attributes'=>[
        'short_text',
        'title',
        ['attribute'=>'date', 'type'=>DetailView::INPUT_DATE],
    ]
]);


