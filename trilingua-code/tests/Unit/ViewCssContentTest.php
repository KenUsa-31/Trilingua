<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ViewCssContentTest extends TestCase
{
    private string $basePath;

    protected function setUp(): void
    {
        parent::setUp();
        // Calculate base path relative to the test file location
        $this->basePath = dirname(__DIR__, 2) . '/resources/css/views';
    }

    /**
     * Test that login.css file exists
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_login_css_file_exists(): void
    {
        $loginCssPath = $this->basePath . '/auth/login.css';
        
        $this->assertFileExists(
            $loginCssPath,
            'login.css file should exist at resources/css/views/auth/login.css'
        );
    }

    /**
     * Test that register.css file exists
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_register_css_file_exists(): void
    {
        $registerCssPath = $this->basePath . '/auth/register.css';
        
        $this->assertFileExists(
            $registerCssPath,
            'register.css file should exist at resources/css/views/auth/register.css'
        );
    }

    /**
     * Test that dashboard.css file exists
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_dashboard_css_file_exists(): void
    {
        $dashboardCssPath = $this->basePath . '/dashboard.css';
        
        $this->assertFileExists(
            $dashboardCssPath,
            'dashboard.css file should exist at resources/css/views/dashboard.css'
        );
    }

    /**
     * Test that welcome.css file exists
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_welcome_css_file_exists(): void
    {
        $welcomeCssPath = $this->basePath . '/welcome.css';
        
        $this->assertFileExists(
            $welcomeCssPath,
            'welcome.css file should exist at resources/css/views/welcome.css'
        );
    }

    /**
     * Test that login.css contains authentication form styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_login_css_contains_auth_form_styles(): void
    {
        $loginCssPath = $this->basePath . '/auth/login.css';
        $content = file_get_contents($loginCssPath);

        $requiredSelectors = [
            '.auth-form',
            '.btn-auth',
            '.social-buttons',
            '.btn-social',
            '.auth-footer',
        ];

        foreach ($requiredSelectors as $selector) {
            $pattern = '/' . preg_quote($selector, '/') . '\s*[,{]/';
            $this->assertMatchesRegularExpression(
                $pattern,
                $content,
                "login.css should contain selector: {$selector}"
            );
        }
    }

    /**
     * Test that login.css contains forgot password link styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_login_css_contains_forgot_password_styles(): void
    {
        $loginCssPath = $this->basePath . '/auth/login.css';
        $content = file_get_contents($loginCssPath);

        $this->assertStringContainsString(
            '.auth-forgot',
            $content,
            'login.css should contain .auth-forgot selector for forgot password link'
        );

        $this->assertStringContainsString(
            '.link-underline',
            $content,
            'login.css should contain .link-underline selector'
        );
    }

    /**
     * Test that register.css contains authentication form styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_register_css_contains_auth_form_styles(): void
    {
        $registerCssPath = $this->basePath . '/auth/register.css';
        $content = file_get_contents($registerCssPath);

        $requiredSelectors = [
            '.auth-form',
            '.btn-auth',
            '.social-buttons',
            '.btn-social',
            '.auth-footer',
        ];

        foreach ($requiredSelectors as $selector) {
            $pattern = '/' . preg_quote($selector, '/') . '\s*[,{]/';
            $this->assertMatchesRegularExpression(
                $pattern,
                $content,
                "register.css should contain selector: {$selector}"
            );
        }
    }

    /**
     * Test that dashboard.css contains dashboard-specific styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_dashboard_css_contains_dashboard_specific_styles(): void
    {
        $dashboardCssPath = $this->basePath . '/dashboard.css';
        $content = file_get_contents($dashboardCssPath);

        $requiredSelectors = [
            '.cards-grid',
            '.stat-card',
            '.table-card',
            '.card-title',
            '.table',
        ];

        foreach ($requiredSelectors as $selector) {
            $pattern = '/' . preg_quote($selector, '/') . '\s*[,{]/';
            $this->assertMatchesRegularExpression(
                $pattern,
                $content,
                "dashboard.css should contain selector: {$selector}"
            );
        }
    }

    /**
     * Test that dashboard.css contains status indicator styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_dashboard_css_contains_status_indicators(): void
    {
        $dashboardCssPath = $this->basePath . '/dashboard.css';
        $content = file_get_contents($dashboardCssPath);

        $statusClasses = [
            '.text-success',
            '.text-warning',
        ];

        foreach ($statusClasses as $class) {
            $this->assertStringContainsString(
                $class,
                $content,
                "dashboard.css should contain status indicator: {$class}"
            );
        }
    }

    /**
     * Test that welcome.css contains welcome page specific styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_welcome_css_contains_welcome_specific_styles(): void
    {
        $welcomeCssPath = $this->basePath . '/welcome.css';
        $content = file_get_contents($welcomeCssPath);

        $requiredSelectors = [
            '.guest-center',
            '.hero',
            '.left-hero',
            '.hero-right',
            '.features',
            '.feature-item',
        ];

        foreach ($requiredSelectors as $selector) {
            $pattern = '/' . preg_quote($selector, '/') . '\s*[,{]/';
            $this->assertMatchesRegularExpression(
                $pattern,
                $content,
                "welcome.css should contain selector: {$selector}"
            );
        }
    }

    /**
     * Test that welcome.css contains icon styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_welcome_css_contains_icon_styles(): void
    {
        $welcomeCssPath = $this->basePath . '/welcome.css';
        $content = file_get_contents($welcomeCssPath);

        $iconClasses = [
            '.icon-wrap',
            '.icon',
            '.icon-dot',
        ];

        foreach ($iconClasses as $class) {
            $this->assertStringContainsString(
                $class,
                $content,
                "welcome.css should contain icon class: {$class}"
            );
        }
    }

    /**
     * Test that all view CSS files are not empty
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_all_view_css_files_are_not_empty(): void
    {
        $cssFiles = [
            'auth/login.css',
            'auth/register.css',
            'dashboard.css',
            'welcome.css',
        ];

        foreach ($cssFiles as $file) {
            $filePath = $this->basePath . '/' . $file;
            $content = file_get_contents($filePath);
            
            $this->assertNotEmpty(
                trim($content),
                "{$file} should not be empty"
            );
        }
    }

    /**
     * Test that all view CSS files have balanced braces
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_all_view_css_files_have_balanced_braces(): void
    {
        $cssFiles = [
            'auth/login.css',
            'auth/register.css',
            'dashboard.css',
            'welcome.css',
        ];

        foreach ($cssFiles as $file) {
            $filePath = $this->basePath . '/' . $file;
            $content = file_get_contents($filePath);
            
            $openBraces = substr_count($content, '{');
            $closeBraces = substr_count($content, '}');
            
            $this->assertEquals(
                $openBraces,
                $closeBraces,
                "{$file} should have balanced opening and closing braces"
            );
        }
    }

    /**
     * Test that login.css and register.css share common authentication styles
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_login_and_register_share_common_auth_styles(): void
    {
        $loginCssPath = $this->basePath . '/auth/login.css';
        $registerCssPath = $this->basePath . '/auth/register.css';
        
        $loginContent = file_get_contents($loginCssPath);
        $registerContent = file_get_contents($registerCssPath);

        // Common selectors that should be in both files
        $commonSelectors = [
            '.auth-form',
            '.btn-auth',
            '.social-buttons',
            '.btn-social',
        ];

        foreach ($commonSelectors as $selector) {
            $this->assertStringContainsString(
                $selector,
                $loginContent,
                "login.css should contain common auth selector: {$selector}"
            );
            
            $this->assertStringContainsString(
                $selector,
                $registerContent,
                "register.css should contain common auth selector: {$selector}"
            );
        }
    }

    /**
     * Test that dashboard.css contains stack utility
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_dashboard_css_contains_stack_utility(): void
    {
        $dashboardCssPath = $this->basePath . '/dashboard.css';
        $content = file_get_contents($dashboardCssPath);

        $this->assertStringContainsString(
            '.stack',
            $content,
            'dashboard.css should contain .stack utility for vertical spacing'
        );
    }

    /**
     * Test that welcome.css contains actions container
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_welcome_css_contains_actions_container(): void
    {
        $welcomeCssPath = $this->basePath . '/welcome.css';
        $content = file_get_contents($welcomeCssPath);

        $this->assertStringContainsString(
            '.actions',
            $content,
            'welcome.css should contain .actions container for buttons'
        );
    }

    /**
     * Test that view CSS files contain responsive media queries
     */
    #[\PHPUnit\Framework\Attributes\Test]
    #[\PHPUnit\Framework\Attributes\Group('per-view-css-architecture')]
    #[\PHPUnit\Framework\Attributes\Group('view-css')]
    public function test_view_css_files_contain_responsive_styles(): void
    {
        $cssFiles = [
            'auth/login.css',
            'auth/register.css',
            'dashboard.css',
            'welcome.css',
        ];

        foreach ($cssFiles as $file) {
            $filePath = $this->basePath . '/' . $file;
            $content = file_get_contents($filePath);
            
            $this->assertStringContainsString(
                '@media',
                $content,
                "{$file} should contain responsive media queries"
            );
        }
    }
}
