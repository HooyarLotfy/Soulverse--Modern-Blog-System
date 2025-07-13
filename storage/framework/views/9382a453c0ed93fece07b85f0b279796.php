

<?php $__env->startSection('title', 'Privacy Policy | ' . config('app.name', 'SoulVerse')); ?>
<?php $__env->startSection('description', 'Privacy Policy for SoulVerse - Learn how we protect and handle your personal data on our creative writing platform.'); ?>

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

    .legal-highlight-box {
        background: rgba(6, 182, 212, 0.05);
        border: 1px solid rgba(6, 182, 212, 0.2);
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin: 2rem 0;
    }

    .dark .legal-highlight-box {
        background: rgba(6, 182, 212, 0.1);
        border-color: rgba(6, 182, 212, 0.3);
    }

    .legal-highlight-title {
        font-weight: 600;
        color: var(--secondary);
        margin-bottom: 0.5rem;
    }

    .legal-highlight-text {
        color: var(--gray-700);
        font-size: 0.9rem;
    }

    .dark .legal-highlight-text {
        color: var(--gray-300);
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
        <h1 class="legal-title">Privacy Policy</h1>
        <p class="legal-subtitle">Your privacy is important to us. Learn how we protect your data.</p>
        <p class="legal-date">Last updated: <?php echo e(date('F j, Y')); ?></p>
    </div>

    <div class="legal-content">
        <div class="legal-section">
            <h2 class="legal-section-title">1. Introduction</h2>
            <p class="legal-text">
                Welcome to SoulVerse ("we," "our," or "us"). We are committed to protecting your personal information and your right to privacy. 
                This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.
            </p>
            <p class="legal-text">
                Please read this Privacy Policy carefully. If you do not agree with the terms of this Privacy Policy, 
                please do not access or use our Platform.
            </p>
        </div>

        <div class="legal-highlight-box">
            <h3 class="legal-highlight-title">Quick Summary</h3>
            <p class="legal-highlight-text">
                We collect information you provide directly to us, automatically through your use of our Platform, 
                and from third parties. We use this information to provide, maintain, and improve our services, 
                communicate with you, and ensure platform security.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">2. Information We Collect</h2>
            
            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Information You Provide to Us</h3>
                <p class="legal-text">We collect information you provide directly to us, including:</p>
                <ul class="legal-list">
                    <li>Account information (username, email address, password)</li>
                    <li>Profile information (display name, bio, avatar image)</li>
                    <li>Content you create (posts, comments, story arcs)</li>
                    <li>Communications with us (support requests, feedback)</li>
                    <li>Payment information (if applicable for premium features)</li>
                </ul>
            </div>

            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Information We Collect Automatically</h3>
                <p class="legal-text">When you use our Platform, we automatically collect certain information, including:</p>
                <ul class="legal-list">
                    <li>Device information (IP address, browser type, operating system)</li>
                    <li>Usage information (pages visited, time spent, features used)</li>
                    <li>Log data (access times, error logs, referrer URLs)</li>
                    <li>Cookies and similar tracking technologies</li>
                </ul>
            </div>

            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Information from Third Parties</h3>
                <p class="legal-text">We may receive information about you from third parties, including:</p>
                <ul class="legal-list">
                    <li>Social media platforms (if you connect your accounts)</li>
                    <li>Analytics providers</li>
                    <li>Other users who interact with your content</li>
                </ul>
            </div>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">3. How We Use Your Information</h2>
            <p class="legal-text">We use the information we collect for various purposes, including to:</p>
            <ul class="legal-list">
                <li>Provide, operate, and maintain our Platform</li>
                <li>Improve, personalize, and expand our Platform</li>
                <li>Process transactions and manage user accounts</li>
                <li>Communicate with you about updates, features, and support</li>
                <li>Monitor and analyze usage patterns and trends</li>
                <li>Detect, investigate, and prevent fraudulent or harmful activities</li>
                <li>Comply with legal obligations and protect our rights</li>
                <li>Send you promotional materials (with your consent)</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">4. Information Sharing and Disclosure</h2>
            <p class="legal-text">
                We do not sell, trade, or otherwise transfer your personal information to outside parties except in the following circumstances:
            </p>
            
            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Public Information</h3>
                <p class="legal-text">
                    Some information you provide may be publicly visible on the Platform, including your username, 
                    profile information, and content you post (unless marked as private).
                </p>
            </div>

            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Service Providers</h3>
                <p class="legal-text">
                    We may share your information with trusted third-party service providers who assist us in operating 
                    our Platform, conducting business, or serving users.
                </p>
            </div>

            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Legal Requirements</h3>
                <p class="legal-text">
                    We may disclose your information if required by law, regulation, legal process, or governmental request.
                </p>
            </div>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">5. Data Security</h2>
            <p class="legal-text">
                We implement appropriate technical and organizational security measures to protect your personal information against 
                unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet 
                or electronic storage is 100% secure.
            </p>
            <p class="legal-text">
                Security measures we employ include:
            </p>
            <ul class="legal-list">
                <li>Encryption of data in transit and at rest</li>
                <li>Regular security assessments and updates</li>
                <li>Access controls and authentication protocols</li>
                <li>Monitoring for suspicious activities</li>
                <li>Staff training on data protection practices</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">6. Cookies and Tracking Technologies</h2>
            <p class="legal-text">
                We use cookies and similar tracking technologies to collect and use personal information about you. 
                Our Cookie Policy explains what cookies are, how we use cookies, and your choices regarding cookies.
            </p>
            
            <div class="legal-subsection">
                <h3 style="font-weight: 600; color: var(--gray-800); margin-bottom: 0.5rem;" class="dark:text-gray-200">Types of Cookies We Use</h3>
                <ul class="legal-list">
                    <li><strong>Essential Cookies:</strong> Necessary for the Platform to function properly</li>
                    <li><strong>Analytics Cookies:</strong> Help us understand how users interact with our Platform</li>
                    <li><strong>Functional Cookies:</strong> Enable enhanced functionality and personalization</li>
                    <li><strong>Marketing Cookies:</strong> Used to deliver relevant advertisements (with consent)</li>
                </ul>
            </div>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">7. Your Rights and Choices</h2>
            <p class="legal-text">
                Depending on your location, you may have certain rights regarding your personal information:
            </p>
            <ul class="legal-list">
                <li><strong>Access:</strong> Request access to your personal information</li>
                <li><strong>Correction:</strong> Request correction of inaccurate or incomplete information</li>
                <li><strong>Deletion:</strong> Request deletion of your personal information</li>
                <li><strong>Portability:</strong> Request transfer of your information to another service</li>
                <li><strong>Restriction:</strong> Request restriction of processing of your information</li>
                <li><strong>Objection:</strong> Object to processing of your information for certain purposes</li>
                <li><strong>Withdrawal:</strong> Withdraw consent for processing (where applicable)</li>
            </ul>
            
            <p class="legal-text">
                To exercise these rights, please contact us using the information provided at the end of this policy.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">8. Data Retention</h2>
            <p class="legal-text">
                We retain your personal information only for as long as necessary to fulfill the purposes for which we collected it, 
                including for the purposes of satisfying any legal, accounting, or reporting requirements.
            </p>
            <p class="legal-text">
                When determining retention periods, we consider factors such as:
            </p>
            <ul class="legal-list">
                <li>The nature and sensitivity of the information</li>
                <li>Legal requirements and obligations</li>
                <li>The purposes for which we process the information</li>
                <li>Whether we can achieve those purposes through other means</li>
            </ul>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">9. Children's Privacy</h2>
            <p class="legal-text">
                Our Platform is not intended for children under the age of 13. We do not knowingly collect personally 
                identifiable information from children under 13. If you are a parent or guardian and believe your child 
                has provided us with personal information, please contact us.
            </p>
            <p class="legal-text">
                For users between 13 and 18 years old, we recommend parental guidance and supervision when using our Platform.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">10. International Data Transfers</h2>
            <p class="legal-text">
                Your information may be transferred to and maintained on computers located outside of your state, province, 
                country, or other governmental jurisdiction where data protection laws may differ. We ensure appropriate 
                safeguards are in place to protect your information during such transfers.
            </p>
        </div>

        <div class="legal-section">
            <h2 class="legal-section-title">11. Changes to This Privacy Policy</h2>
            <p class="legal-text">
                We may update this Privacy Policy from time to time. We will notify you of any material changes by posting 
                the new Privacy Policy on this page and updating the "Last updated" date.
            </p>
            <p class="legal-text">
                You are advised to review this Privacy Policy periodically for any changes. Your continued use of the Platform 
                after any modifications to this Privacy Policy will constitute your acknowledgment of the modifications.
            </p>
        </div>

        <div class="legal-contact-box">
            <h3 class="legal-contact-title">Contact Us About Privacy</h3>
            <p class="legal-contact-text">
                If you have any questions about this Privacy Policy or our data practices, please contact us at: 
                <strong>privacy@soulverse.com</strong> or through our contact form on the Platform.
            </p>
            <p class="legal-contact-text">
                We will respond to your inquiry within a reasonable timeframe and work to address any concerns you may have.
            </p>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\Vs Code Projects\Laravel Projects\SoulVerse Web App\soulverse\resources\views/privacy.blade.php ENDPATH**/ ?>