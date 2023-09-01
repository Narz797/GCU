<!DOCTYPE html>
<html>
<head>
    <title>Real-time Recommendation System</title>
    <style>
        #recommendations {
            list-style: none;
            padding: 0;
        }
        #recommendations li {
            margin: 5px;
            padding: 5px;
            border: 1px solid #ccc;
            display: none;
        }
    </style>
</head>
<body>
    <h1>Real-time Recommendation System</h1>
    <input type="text" id="searchInput" placeholder="Type a letter or part of a word">
    <ul id="recommendations"></ul>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const items = [
                "apple", "banana", "cherry", "date", "fig",
                "grape", "kiwi", "lemon", "mango", "orange",
                "pear", "quince", "raspberry", "strawberry", "watermelon"
            ];

            $("#searchInput").on("input", function() {
                const query = $(this).val().toLowerCase();
                const recommendations = getRecommendations(query);

                const $recommendationsList = $("#recommendations");
                $recommendationsList.empty();

                if (recommendations.length > 0) {
                    recommendations.forEach(function(item) {
                        const $li = $("<li>").text(item);
                        $recommendationsList.append($li);
                        $li.show();
                    });
                } else {
                    const $li = $("<li>").text("No recommendations found.");
                    $recommendationsList.append($li);
                    $li.show();
                }
            });

            function getRecommendations(query) {
                const filteredItems = items.filter(function(item) {
                    return item.toLowerCase().includes(query);
                });
                return filteredItems;
            }
        });
    </script>
</body>
</html>