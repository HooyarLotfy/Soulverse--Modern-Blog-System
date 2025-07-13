<style>
       :root {
            --white: #ffffff;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-800: #1f2937;
            --primary: #8b5cf6;
            --secondary: #06b6d4;
        }
       /* Footer */
        footer {
            background-color: var(--white);
            color: var(--gray-300);
            padding: 3rem 1.5rem 2rem;
            margin-top: 4rem;
        }

        .dark footer {
            background-color: #1a1a1a;
            color: #e2e8f0;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            text-align: center;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .dark .footer-logo {
            color: #f1f5f9;
        }

        .footer-text {
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .dark .footer-text {
            color: #cbd5e1;
        }

        .footer-links {
            display: flex;
            gap: 2rem;
            justify-content: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .footer-link {
            color: var(--gray-400);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: var(--primary);
        }

        .dark .footer-link {
            color: #94a3b8;
        }

        .dark .footer-link:hover {
            color: var(--primary);
        }

        .footer-bottom {
            border-top: 1px solid var(--gray-800);
            padding-top: 2rem;
            font-size: 0.875rem;
            opacity: 0.6;
        }

        .dark .footer-bottom {
            border-top: 1px solid #374151;
            color: #9ca3af;
        }
</style>
<!-- Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <span class="logo-icon">🧿</span>
            <span>SoulVerse</span>
        </div>
        <p class="footer-text">
            A creative space for writers, storytellers, and readers to connect and share ideas.
        </p>
        <div class="footer-links">
            <a href="<?php echo e(url('/')); ?>" class="footer-link">Home</a>
            <a href="<?php echo e(route('posts.index')); ?>" class="footer-link">Posts</a>
            <a href="<?php echo e(route('arcs.index')); ?>" class="footer-link">Arcs</a>
            <a href="<?php echo e(route('privacy')); ?>" class="footer-link">Privacy</a>
            <a href="<?php echo e(route('terms')); ?>" class="footer-link">Terms</a>
        </div>
        <div class="footer-social" style="display: flex; gap: 1.5rem; justify-content: center; margin-bottom: 2rem;">
            <a href="https://github.com/" target="_blank" rel="noopener" class="footer-social-link" aria-label="GitHub" style="display: inline-flex; align-items: center; justify-content: center; width: 2.5rem; height: 2.5rem; border-radius: 50%; background: transparent; transition: transform 0.3s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.3s; color: #64748b; font-size: 1.5rem;">
                <svg fill="currentColor" viewBox="0 0 24 24" width="1.7em" height="1.7em">
                    <path d="M12 2C6.477 2 2 6.484 2 12.021c0 4.428 2.865 8.184 6.839 9.504.5.092.682-.217.682-.483 0-.237-.009-.868-.014-1.703-2.782.605-3.369-1.342-3.369-1.342-.454-1.154-1.11-1.462-1.11-1.462-.908-.62.069-.608.069-.608 1.004.07 1.532 1.032 1.532 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.339-2.221-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.025A9.564 9.564 0 0 1 12 6.844c.85.004 1.705.115 2.504.337 1.909-1.295 2.748-1.025 2.748-1.025.546 1.378.202 2.397.1 2.65.64.7 1.028 1.595 1.028 2.688 0 3.847-2.337 4.695-4.566 4.944.359.309.678.919.678 1.853 0 1.337-.012 2.419-.012 2.749 0 .268.18.579.688.481C19.138 20.2 22 16.447 22 12.021 22 6.484 17.523 2 12 2z"/>
                </svg>
            </a>
            <a href="https://github.com/HooyarLotfy/" target="_blank" rel="noopener" class="footer-social-link" aria-label="LinkedIn" style="display: inline-flex; align-items: center; justify-content: center; width: 2.5rem; height: 2.5rem; border-radius: 50%; background: transparent; transition: transform 0.3s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.3s; color: #64748b; font-size: 1.5rem;">
                <svg fill="currentColor" viewBox="0 0 24 24" width="1.7em" height="1.7em">
                    <path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11.75 20h-3v-10h3v10zm-1.5-11.27c-.97 0-1.75-.79-1.75-1.76 0-.97.78-1.76 1.75-1.76s1.75.79 1.75 1.76c0 .97-.78 1.76-1.75 1.76zm15.25 11.27h-3v-5.6c0-1.34-.03-3.07-1.87-3.07-1.87 0-2.16 1.46-2.16 2.97v5.7h-3v-10h2.89v1.36h.04c.4-.75 1.37-1.54 2.82-1.54 3.01 0 3.57 1.98 3.57 4.56v5.62z"/>
                </svg>
            </a>
            <a href="https://www.youtube.com/@Ludus_Universe" target="_blank" rel="noopener" class="footer-social-link" aria-label="YouTube" style="display: inline-flex; align-items: center; justify-content: center; width: 2.5rem; height: 2.5rem; border-radius: 50%; background: transparent; transition: transform 0.3s cubic-bezier(.68,-0.55,.27,1.55), box-shadow 0.3s; color: #64748b; font-size: 1.5rem;">
                <svg fill="currentColor" viewBox="0 0 24 24" width="1.7em" height="1.7em">
                    <path d="M23.498 6.186a2.994 2.994 0 0 0-2.108-2.117C19.425 3.5 12 3.5 12 3.5s-7.425 0-9.39.569A2.994 2.994 0 0 0 .502 6.186C0 8.153 0 12 0 12s0 3.847.502 5.814a2.994 2.994 0 0 0 2.108 2.117C4.575 20.5 12 20.5 12 20.5s7.425 0 9.39-.569a2.994 2.994 0 0 0 2.108-2.117C24 15.847 24 12 24 12s0-3.847-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </a>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo e(date('Y')); ?> SoulVerse. Made with ❤️ for writers and readers.</p>
        </div>
    </div>
</footer>

<style>
    .footer-social-link {
        box-shadow: 0 2px 8px rgba(139,92,246,0.08);
        background: transparent;
        color: #64748b;
        position: relative;
        overflow: hidden;
    }
    .footer-social-link:hover {
        color: #fff;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        transform: scale(1.18) rotate(-8deg);
        box-shadow: 0 8px 24px 0 rgba(139,92,246,0.25), 0 1.5px 8px 0 rgba(6,182,212,0.12);
        transition: transform 0.3s cubic-bezier(.68,-0.55,.27,1.55), background 0.3s, color 0.3s, box-shadow 0.3s;
    }
    .dark .footer-social-link {
        color: #cbd5e1;
        background: transparent;
    }
    .dark .footer-social-link:hover {
        color: #fff;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        box-shadow: 0 8px 24px 0 rgba(139,92,246,0.35), 0 1.5px 8px 0 rgba(6,182,212,0.18);
    }
</style><?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/layouts/footer.blade.php ENDPATH**/ ?>