<!-- resources/views/chat/index.blade.php -->

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Xat amb ChatGPT</title>
</head>
<body>
<h1>Xat amb ChatGPT</h1>
<form action="{{ url('/chat/send') }}" method="post">
    @csrf
    <input type="text" name="message" placeholder="Escriu el teu missatge aquí">
    <button type="submit">Enviar</button>
</form>

<div id="chatMessages">
    <!-- Els missatges es mostraran aquí -->
</div>

<script>
    document.querySelector('form').addEventListener('submit', function (e) {
        e.preventDefault();
        var form = this;
        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            }
        }).then(response => response.text())
            .then(html => {
                document.querySelector('#chatMessages').innerHTML = html;
            });
    });
</script>
</body>
</html>

