<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue CDN Example</title>
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
</head>
<body>
    <div id="app">
        <ul>
            <li v-for="item in items" :key="item.id">
                {{ item.name }}
                <button @click="editItem(item)">Editar</button>
            </li>
        </ul>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: {
                items: [
                    { id: 1, name: 'Item 1' },
                    { id: 2, name: 'Item 2' },
                    // Mais itens aqui
                ]
            },
            methods: {
                editItem(item) {
                    // Simulando uma atualização de dados
                    item.name = 'Item Atualizado';
                }
            }
        });
    </script>
</body>
</html>
