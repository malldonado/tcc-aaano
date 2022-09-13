jQuery(document).ready(function(){       

    var telefones = jQuery('#telefones');
    var telefone = jQuery('.telefone');
    var btnAdicionar = jQuery('.adicionar');
    var btnRemover = jQuery('.remover');

    btnAdicionar.click(function(){
        var clone = telefone.clone(true); 
        clone.removeClass('telefone');
        clone.addClass('clone');
        clone.find('input[type=text]').val('')
        clone.find('#lixeira').removeClass('hidden');
        telefones.append(clone);                                  
    });

    btnRemover.on('click', function(){
        var telefone = jQuery(this).closest('.clone');
        telefone.slideUp('slow', function(){
            telefone.remove();
        });           
    });

 });
