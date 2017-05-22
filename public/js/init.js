var live          = false,
    highlighting  = true,
    bootstrapping = true,
    chaining      = true;

$(function() {

    var options = {
            editor: document.getElementById('content'),
            textarea: '<textarea name="content"></textarea>'
        },
        editor = new Pen(options);

    editor.destroy()

    rangy.init();
    highlighter = rangy.createHighlighter();

    highlighter.addClassApplier(rangy.createClassApplier("highlight", {
        ignoreWhiteSpace: true,
        tagNames: ["span", "a"]
    }));

    $('[data-pen]').click(function(){
        $(this).toggleClass('live')
        if(live) {
            editor.destroy()
            $('#options button')
                .removeClass('dead')
                .prop("disabled",false)

            $('[data-p]').click(function(){
                window.location.pathname = '/p/'+$(this).data('p')
            }).addClass('fixed')

            highlights = highlighter.serialize()
            highlighter.removeAllHighlights()

            var data = {
                id        : $('[data-id]').data('id'),
                content   : $('[data-content]').html()
            }

            $.post('/', data, function(data){
                if(data === 'true'){
                    highlighter.deserialize(highlights)
                }
            });
        } else {
            $('[data-p]').off('click').removeClass('fixed')
            editor.rebuild().focus()
            $('#options button').not(this)
                .addClass('dead').prop("disabled",true);
        }
        live = !live
    })

    $('[data-highlight]').click(function(){
        if(highlighting) {
            highlighter.highlightSelection("highlight");
        }
    })

    $('[data-new]').click(function(){
        $.post('/new', function(data){
            window.location.pathname = '/p/'+data
        });
    })

    $('[data-bootstrap]').click(function(){
        if($('#content .highlight').length === 0){
            alert('no highlights made')
            return
        }
        if(bootstrapping) {
            $('#sources-preview').append('<span class="highlight"></span>')
            $('#sources-preview span').append($('#content .highlight').clone().each(function(){ $(this).append('&nbsp;') }).text())
            $('[data-bootstraping]').addClass('show')
        }
    })

    $('[data-chain]').click(function(){
        if($('#content .highlight').length === 0){
            alert('no highlights made')
            return
        }
        if(chaining) {
            $('#chains-preview').append('<span class="highlight"></span>')
            $('#chains-preview span').append($('#content .highlight').clone().each(function(){ $(this).append('&nbsp;') }).text())
            $('[data-chaining]').addClass('show')
        }
    })

    $('[data-no]').click(function(){
        $('#sources-preview').html('')
        $('[data-bootstraping]').removeClass('show')
        $('#chains-preview').html('')
        $('[data-chaining]').removeClass('show')
    })

    $('[data-yes]').click(function(){
        var data = {
            sources: '<span class="highlight" data-p="'+$('[data-id]').data('id')+'">'+$('#sources-preview span').html()+'</span>'
        }

        $.post('/bootstrap', data, function(data){

            p = data
            $('#content .highlight').attr('data-p', p.toString()).removeClass('highlight').addClass('fixed')

            highlights = highlighter.serialize()
            highlighter.removeAllHighlights()

            var data = {
                id        : $('[data-id]').data('id'),
                content   : $('[data-content]').html()
            }

            $.post('/', data, function(data){
                if(data === 'true'){
                    window.location.pathname = '/p/'+p
                }
            });


        });
    })

    $('[data-yes-chain]').click(function(){
        chain = $('[data-chain-to]').val()

        var data = {
            sources: '<span class="highlight" data-p="'+$('[data-id]').data('id')+'">'+$('#chains-preview span').html()+'</span>',
            chain: chain
        }

        $.post('/chain', data, function(data){

            p = data
            $('#content .highlight').attr('data-p', chain).removeClass('highlight').addClass('fixed')

            highlights = highlighter.serialize()
            highlighter.removeAllHighlights()

            var data = {
                id        : $('[data-id]').data('id'),
                content   : $('[data-content]').html()
            }

            $.post('/', data, function(data){
                if(data === 'true'){
                    window.location.pathname = '/p/'+chain
                }
            });


        });
    })

    $('body').keyup(function(e){
        if(e.keyCode === 69 && !live){
            $('[data-pen]').trigger('click')
        }
        if(e.keyCode === 27 && live){
            $('[data-pen]').trigger('click')
        }
        if(e.keyCode === 72 && highlighting && !live){
            $('[data-highlight]').trigger('click')
        }
        if(e.keyCode === 81 && bootstrapping && !live){
            $('[data-bootstrap]').trigger('click')
        }
        if(e.keyCode === 67 && chaining && !live){
            $('[data-chain]').trigger('click')
        }
        if(e.keyCode === 82 && !live){
            highlighter.unhighlightSelection()
        }
    })

    $('[data-p]').hover(function(){
        $(this).toggleClass('active')
    })
    $('[data-p]').click(function(){
        window.location.pathname = '/p/'+$(this).data('p')
    })

})
