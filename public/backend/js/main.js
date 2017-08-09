$(function(){

    tests({
        form: $('#save_maximum_heart_rate'),
        btn: $('#btn_save_maximum_heart_rate'),
        inputSelect: $("#protocol_maximum_heart_rate"),
        classInputText: 'input_maximum_heart_rate',
        inputText: $('.input_maximum_heart_rate'),
        row: $('#save_maximum_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_maximum_heart_rate'
        }
    });

    tests({
        form: $('#save_minimum_heart_rate'),
        btn: $('#btn_save_minimum_heart_rate'),
        inputSelect: $("#protocol_minimum_heart_rate"),
        classInputText: 'input_minimum_heart_rate',
        inputText: $('.input_minimum_heart_rate'),
        row: $('#save_minimum_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_minimum_heart_rate'
        }
    });

    tests({
        form: $('#save_reserve_heart_rate'),
        btn: $('#btn_save_reserve_heart_rate'),
        inputSelect: $("#protocol_reserve_heart_rate"),
        classInputText: 'input_reserve_heart_rate',
        inputText: $('.input_reserve_heart_rate'),
        row: $('#save_reserve_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_reserve_heart_rate'
        }
    });

});
$(function(){

    tests({
        form: $('#save_maximum_vo2'),
        btn: $('#btn_save_maximum_vo2'),
        inputSelect: $("#protocol_maximum_vo2"),
        classInputText: 'input_maximum_vo2',
        inputText: $('.input_maximum_vo2'),
        row: $('#save_maximum_vo2').find('.row-input'),
        route: {
            destroy: 'destroy_maximum_vo2',
            find: 'find_protocol_maximum_vo2'
        }
    });

    tests({
        form: $('#save_training_vo2'),
        btn: $('#btn_save_training_vo2'),
        inputSelect: $("#protocol_training_vo2"),
        classInputText: 'input_training_vo2',
        inputText: $('.input_training_vo2'),
        row: $('#save_training_vo2').find('.row-input'),
        route: {
            destroy: 'destroy_training_vo2'
        }
    });

    /*frequencyHeart({
        form: $('#save_minimum_heart_rate'),
        btn: $('#btn_save_minimum_heart_rate'),
        inputSelect: $("#protocol_minimum_heart_rate"),
        classInputText: 'input_minimum_heart_rate',
        inputText: $('.input_minimum_heart_rate'),
        row: $('#save_minimum_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_minimum_heart_rate'
        }
    });

    frequencyHeart({
        form: $('#save_reserve_heart_rate'),
        btn: $('#btn_save_reserve_heart_rate'),
        inputSelect: $("#protocol_reserve_heart_rate"),
        classInputText: 'input_reserve_heart_rate',
        inputText: $('.input_reserve_heart_rate'),
        row: $('#save_reserve_heart_rate').find('.row-input'),
        route: {
            destroy: 'destroy_reserve_heart_rate'
        }
    });*/

});