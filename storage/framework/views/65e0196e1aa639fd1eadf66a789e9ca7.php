

<?php $__env->startSection('title', 'Terms of Service | ' . config('app.name', 'SoulVerse')); ?>
<?php $__env->startSection('description', 'Terms of Service for SoulVerse - Read our terms and conditions for using our creative writing platform.'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .legal-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 2rem 1.5rem;
    }

    .legal-header {
        text-align: center;
        margin-bottom: 3rem;
        padding: 3rem 0;
        background: linear-gradient(135deg, 
            rgba(139, 92, 246, 0.1) 0%, 
            rgba(6, 182, 212, 0.05) 50%, 
            rgba(245, 158, 11, 0.1) 100%);
        border-radius: 1rem;
    }

    .dark .legal-header {
        background: linear-gradient(135deg, 
            rgba(139, 92, 246, 0.2) 0%, 
            rgba(6, 182, 212, 0.1) 50%, 
            rgba(245, 158, 11, 0.15) 100%);
    }

    .legal-title {
        font-family: var(--font-serif, 'Playfair Display', serif);
        font-size: 3rem;
        font-weight: 700;
        color: var(--gray-800);
        margin-bottom: 1rem;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .dark .legal-title {
        color: var(--gray-100);
    }

    .legal-subtitle {
        font-size: 1.125rem;
        color: var(--gray-600);
        margin-bottom: 0.5rem;
    }

    .dark .legal-subtitle {
        color: var(--gray-300);
    }

    .legal-date {
        font-size: 0.875rem;
        color: var(--gray-500);
    }

    .dark .legal-date {
        color: var(--gray-400);
    }

    .legal-content {
        background: white;
        border-radius: 1rem;
        padding: 3rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-200);
        line-height: 1.8;
    }

    .dark .legal-content {
        background: var(--gray-800);
        border-color: var(--gray-700);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
        color: var(--gray-100);
    }

    .legal-section {
        margin-bottom: 2.5rem;
    }

    .legal-section:last-child {
        margin-bottom: 0;
    }

    .legal-section-title {
        font-family: var(--font-serif, 'Playfair Display', serif);
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid rgba(139, 92, 246, 0.2);
    }

    .dark .legal-section-title {
        color: var(--primary);
        border-bottom-color: rgba(139, 92, 246, 0.3);
    }

    .legal-text {
        color: var(--gray-700);
        margin-bottom: 1rem;
    }

    .dark .legal-text {
        color: var(--gray-300);
    }

    .legal-list {
        list-style: none;
        padding-left: 0;
        margin: 1rem 0;
    }

    .legal-list li {
        position: relative;
        padding-left: 2rem;
        margin-bottom: 0.75rem;
        color: var(--gray-700);
    }

    .dark .legal-list li {
        color: var(--gray-300);
    }

    .legal-list li::before {
        content: '•';
        position: absolute;
        left: 0.5rem;
        color: var(--primary);
        font-weight: bold;
        font-size: 1.2rem;
    }

    .legal-subsection {
        margin: 1.5rem 0;
        padding-left: 1rem;
        border-left: 3px solid rgba(139, 92, 246, 0.3);
    }

    .legal-contact-box {
        background: rgba(139, 92, 246, 0.05);
        border: 1px solid rgba(139, 92, 246, 0.2);
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin: 2rem 0;
    }

    .dark .legal-contact-box {
        background: rgba(139, 92, 246, 0.1);
        border-color: rgba(139, 92, 246, 0.3);
    }

    .legal-contact-title {
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 0.5rem;
    }

    .legal-contact-text {
        color: var(--gray-700);
        font-size: 0.9rem;
    }

    .dark .legal-contact-text {
        color: var(--gray-300);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .legal-container {
            padding: 1rem;
        }

        .legal-header {
            padding: 2rem 1rem;
            margin-bottom: 2rem;
        }

        .legal-title {
            font-size: 2rem;
        }

        .legal-content {
            padding: 1.5rem;
        }

        .legal-section-title {
            font-size: 1.25rem;
        }
    }
</style>

<div class="legal-container">
    <div class="legal-header">
        <h1 class="legal-title">Terms of Service</h1>
        <p class="legal-subtitle">Please read these terms carefully before using SoulVerse</p>
        <p class="legal-date">Last updated: <?php echo e(date('F j, Y')); ?></p>
    </div>

    <div class="legal-content">
        <div class="legal-section">
            <h2 class="legal-section-title">1. Acceptance of Terms</h2>
            <p class="legal-text">
                By accessing and using SoulVerse ("the Platform"), you accept and agree to be bound by the terms and provision of this agreement. 
                If you do not agree to abide by the above, please do not use this service.
            </p>
            <p class="legal-text">
                These Terms of Service ("Terms") govern your relationship with SoulVerse operated by our team. 
                Your access to and use of the Platform is conditioned on your acceptance of and compliance with these Terms.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">2. Description of Service</h2>
            <p class="legal-text">
                SoulVerse is a creative writing platform that allows users to:
            </p>
            <ul class="legal-list">
                <li>Create, publish, and share written content including stories, articles, and blog posts</li>
                <li>Engage with other writers through comments and discussions</li>
                <li>Organize content into thematic collections called "Story Arcs"</li>
                <li>Build a community around creative writing and storytelling</li>
                <li>Access tools and features designed to enhance the writing experience</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">3. User Accounts and Registration</h2>
            <p class="legal-text">
                To access certain features of the Platform, you must register for an account. When you register, you agree to:
            </p>
            <ul class="legal-list">
                <li>Provide accurate, current, and complete information about yourself</li>
                <li>Maintain and promptly update your account information</li>
                <li>Maintain the security and confidentiality of your password</li>
                <li>Accept responsibility for all activities that occur under your account</li>
                <li>Notify us immediately of any unauthorized use of your account</li>
            </ul>
            
            <div class="legal-subsection">
                <p class="legal-text">
                    You must be at least 13 years old to create an account. If you are under 18, you represent that you have 
                    permission from your parent or guardian to use the Platform.
                </p>
            </div>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">4. Content and Conduct</h2>
            <p class="legal-text">
                You are solely responsible for the content you post on SoulVerse. By posting content, you represent and warrant that:
            </p>
            <ul class="legal-list">
                <li>You have the right to post the content and grant us the licenses described in these Terms</li>
                <li>Your content does not infringe upon the rights of any third party</li>
                <li>Your content complies with applicable laws and regulations</li>
                <li>Your content does not contain harmful, offensive, or inappropriate material</li>
            </ul>

            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Prohibited Content</h3>
                <p class="legal-text">You may not post content that:</p>
                <ul class="legal-list">
                    <li>Is illegal, harmful, threatening, abusive, harassing, defamatory, or vulgar</li>
                    <li>Infringes on intellectual property rights</li>
                    <li>Contains spam, advertising, or promotional material</li>
                    <li>Impersonates any person or entity</li>
                    <li>Contains malicious code or harmful links</li>
                </ul>
            </div>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">5. Intellectual Property Rights</h2>
            <p class="legal-text">
                You retain ownership of any intellectual property rights that you hold in content you post to SoulVerse. 
                However, by posting content, you grant us a worldwide, non-exclusive, royalty-free license to use, 
                modify, publicly perform, publicly display, reproduce, and distribute such content on and through the Platform.
            </p>
            <p class="legal-text">
                The Platform itself, including its design, functionality, and underlying technology, is owned by SoulVerse 
                and is protected by copyright, trademark, and other intellectual property laws.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">6. Privacy and Data Protection</h2>
            <p class="legal-text">
                Your privacy is important to us. Our Privacy Policy explains how we collect, use, and protect your information 
                when you use the Platform. By using SoulVerse, you agree to the collection and use of information in accordance 
                with our Privacy Policy.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">7. Termination</h2>
            <p class="legal-text">
                We may terminate or suspend your account and access to the Platform immediately, without prior notice or liability, 
                for any reason whatsoever, including without limitation if you breach the Terms.
            </p>
            <p class="legal-text">
                Upon termination, your right to use the Platform will cease immediately. If you wish to terminate your account, 
                you may simply discontinue using the Platform.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">8. Disclaimers and Limitation of Liability</h2>
            <p class="legal-text">
                The Platform is provided on an "AS IS" and "AS AVAILABLE" basis. We make no warranties, expressed or implied, 
                and hereby disclaim all warranties including without limitation, implied warranties or conditions of merchantability, 
                fitness for a particular purpose, or non-infringement of intellectual property.
            </p>
            <p class="legal-text">
                In no event shall SoulVerse be liable for any indirect, incidental, special, consequential, or punitive damages, 
                including without limitation, loss of profits, data, use, goodwill, or other intangible losses.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">9. Changes to Terms</h2>
            <p class="legal-text">
                We reserve the right, at our sole discretion, to modify or replace these Terms at any time. 
                If a revision is material, we will try to provide at least 30 days notice prior to any new terms taking effect.
            </p>
            <p class="legal-text">
                Your continued use of the Platform after any such changes constitutes your acceptance of the new Terms. 
                If you do not agree to the new Terms, please stop using the Platform.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">10. Governing Law</h2>
            <p class="legal-text">
                These Terms shall be interpreted and governed by the laws of the jurisdiction in which SoulVerse operates, 
                without regard to conflict of law provisions. Any disputes arising from these Terms or the Platform will be 
                subject to the exclusive jurisdiction of the courts in that jurisdiction.
            </p>
        </div>

        <div class="legal-contact-box">
            <h3 class="legal-contact-title">Contact Information</h3>
            <p class="legal-contact-text">
                If you have any questions about these Terms of Service, please contact us at: 
                <strong>legal@soulverse.com</strong> or through our contact form on the Platform.
            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/terms.blade.php ENDPATH**/ ?>