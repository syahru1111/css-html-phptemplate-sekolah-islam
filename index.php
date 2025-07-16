<?php
// PHP variables for dynamic content
$site_title = "Ummul Ayman - Islamic School";
$hero_title = "Menyekolahkan Santri, Bukan Menyantrikan Anak Sekolah";
$highlight_word = "Menyantrikan";

// Statistics data (could come from database)
$statistics = [
    [
        'title' => 'Total<br>Jumlah Santri',
        'number' => '2.879',
        'icon' => '👥'
    ],
    [
        'title' => 'Santri<br>Wustha Putra',
        'number' => '1.169',
        'icon' => '👤'
    ],
    [
        'title' => 'Santri<br>Ulya Putra',
        'number' => '603',
        'icon' => '👤'
    ],
    [
        'title' => 'Kuliyyatul<br>Mu\'allimin',
        'number' => '226',
        'icon' => '🎓'
    ],
    [
        'title' => 'Santri<br>Wustha Putri',
        'number' => '559',
        'icon' => '👤'
    ],
    [
        'title' => 'Santri<br>Ulya Putri',
        'number' => '322',
        'icon' => '👤'
    ]
];

// Navigation menu items
$nav_items = [
    ['name' => 'Beranda', 'url' => '#', 'active' => true],
    ['name' => 'Informasi', 'url' => '#', 'dropdown' => true],
    ['name' => 'Tentang Kami', 'url' => '#', 'dropdown' => true]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Header Navigation -->
    <header class="header">
        <nav class="nav-container">
            <div class="nav-brand">
                <h2>Beranda</h2>
            </div>
            <div class="nav-menu">
                <?php foreach ($nav_items as $item): ?>
                    <a href="<?php echo $item['url']; ?>" class="nav-link <?php echo isset($item['active']) && $item['active'] ? 'active' : ''; ?>">
                        <?php echo $item['name']; ?>
                        <?php if (isset($item['dropdown']) && $item['dropdown']): ?>
                            <span class="dropdown-arrow">▼</span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="nav-search">
                <button class="search-btn">🔍</button>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <?php 
                        $title_parts = explode($highlight_word, $hero_title);
                        echo $title_parts[0] . '<span class="highlight">' . $highlight_word . '</span>' . $title_parts[1];
                        ?>
                    </h1>
                    <div class="hero-buttons">
                        <button class="btn btn-primary" onclick="window.location.href='profil.php'">PROFIL</button>
                        <button class="btn btn-secondary" onclick="window.location.href='pendaftaran.php'">PENDAFTARAN</button>
                    </div>
                </div>
                <div class="hero-image">
                    <div class="image-circle">
                        <div class="placeholder-image">
                            <div class="image-text">Foto Ustadz</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="stats">
        <div class="stats-container">
            <div class="stats-left">
                <div class="stats-image">
                    <div class="placeholder-students">
                        <div class="image-text">Foto Santri</div>
                    </div>
                </div>
            </div>
            <div class="stats-right">
                <div class="stats-grid">
                    <?php foreach ($statistics as $stat): ?>
                        <div class="stat-card">
                            <div class="stat-icon">
                                <div class="icon-circle">
                                    <span class="icon"><?php echo $stat['icon']; ?></span>
                                </div>
                            </div>
                            <h3 class="stat-title"><?php echo $stat['title']; ?></h3>
                            <div class="stat-number"><?php echo $stat['number']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Add smooth scrolling and interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate statistics on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all stat cards
            document.querySelectorAll('.stat-card').forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });

            // Add hover effects to buttons
            document.querySelectorAll('.btn').forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-2px) scale(1.05)';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>
</body>
</html>
