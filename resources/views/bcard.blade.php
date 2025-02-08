<!-- member.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Member Profile</h2>
    <div id="member-info">
        <p><strong>Name:</strong> <span id="member-name"></span></p>
        <p><strong>Account:</strong> <span id="member-account"></span></p>
        <p><strong>Email:</strong> <span id="member-email"></span></p>
        <p><strong>Phone:</strong> <span id="member-phone"></span></p>
        <p><strong>Address:</strong> <span id="member-address"></span></p>
        <p><strong>Description:</strong> <span id="member-description"></span></p>
        <img id="member-avatar" src="" alt="Avatar" style="max-width: 150px; display: none;">
        
        <h3>Portfolio</h3>
        <div id="portfolio-info">
            <p><strong>Background Color:</strong> <span id="portfolio-bg"></span></p>
            <p><strong>Video:</strong> <a id="portfolio-video" href="#" target="_blank" style="display: none;">View Video</a></p>
            <p><strong>Voice:</strong> <a id="portfolio-voice" href="#" target="_blank" style="display: none;">Listen</a></p>
        </div>

        <h3>Companies</h3>
        <ul id="companies-list"></ul>
    </div>
    <p id="error-message" style="color: red; display: none;">Failed to load member data.</p>

    <script>
        $(document).ready(function() {
            // 取得 URL 中的 account 參數
            let urlSegments = window.location.pathname.split('/');
            let account = urlSegments[urlSegments.length - 1];
            
            $.ajax({
                url: '/api/members/' + account,
                method: 'GET',
                success: function(response) {
                    $('#member-name').text(response.name);
                    $('#member-account').text(response.account);
                    $('#member-email').text(response.email || 'N/A');
                    $('#member-phone').text(response.mobile || 'N/A');
                    $('#member-address').text(response.address || 'N/A');
                    $('#member-description').text(response.description || 'N/A');
                    if (response.avatar) {
                        $('#member-avatar').attr('src', response.avatar).show();
                    }
                    
                    // 顯示 Portfolio 資訊
                    if (response.portfolio) {
                        $('#portfolio-bg').text(response.portfolio.bg_color || 'N/A');
                        if (response.portfolio.video) {
                            $('#portfolio-video').attr('href', response.portfolio.video).show();
                        }
                        if (response.portfolio.voice) {
                            $('#portfolio-voice').attr('href', response.portfolio.voice).show();
                        }
                    }
                    
                    // 顯示 Companies 資訊
                    if (response.companies && response.companies.length > 0) {
                        $('#companies-list').empty();
                        response.companies.forEach(function(company) {
                            $('#companies-list').append('<li><strong>' + (company.name || 'Company') + '</strong>: ' + (company.description || 'No description') + '</li>');
                        });
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 404) {
                        alert("Member not found.");
                        window.location.href = "/";
                    } else {
                        $('#error-message').show();
                    }
                }
            });
        });
    </script>
</body>
</html>
