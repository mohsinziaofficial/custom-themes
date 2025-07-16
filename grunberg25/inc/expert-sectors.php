<?php
function expert_sectors()
{
    ob_start();

?>
    <div class="expert-sectors-wrapper">
        <div class="expert-sectors">
            <div class="sector" data-url="/how-we-can-help-you/business-start-up/cloud-accounting-services/">
                <span>
                    <h5>Cloud Accounting</h5>
                    <p>Using the latest technology, we help you gain greater insights into your finances, while ensuring that you maintain compliance with the ever-changing regulatory landscape.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/business-start-up/">
                <span>
                    <h5>Starting Out</h5>
                    <p>Cultivating your business from the ground up is no easy task. Our great people have a long history of helping start ups meet their goals with support and advice that really add value.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/growing-businesses/">
                <span>
                    <h5>Growing Business</h5>
                    <p>Collaborating with business owners to help them scale up, we provide proactive business advice and support that helps you achieve great results.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/business-start-up/corporate-tax/">
                <span>
                    <h5>Corporate Tax</h5>
                    <p>Helping your business to make the most reliefs and allowances, while keeping you compliant, to ensure you have the funds to reinvest in your success.</p>
                </span>
            </div>
            <div class="sector active" data-url="/how-we-can-help-you/personal-tax-and-wealth-planning/">
                <span>
                    <h5>Personal Tax and Wealth Planning</h5>
                    <p>Managing your personal tax and wealth with careful, expert-led planning can be critical to you achieving great results as you plan for the future.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/audit/">
                <span>
                    <h5>Audit</h5>
                    <p>We work with a wide range of businesses to ensure they continue to meet their audit requirements, whilst providing a more personalised service focused not only on compliance, but also on helping businesses achieve great results.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/business-start-up/payroll/">
                <span>
                    <h5>Payroll</h5>
                    <p>We work with businesses of all sizes to provide a complete and reliable outsourced payroll solution, so you can step back and relax.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/business-exit-planning/">
                <span>
                    <h5>Planning to Exit</h5>
                    <p>Every business has a lifecycle, and an exit strategy is a key element of any business plan. We help you achieve great results with tax planning and advice tailored to your unique scenario.</p>
                </span>
            </div>
            <div class="sector" data-url="/how-we-can-help-you/international-accounting-services/">
                <span>
                    <h5>International</h5>
                    <p>Many businesses find the complexities of international trading difficult to deal with. We bring local knowledge to global businesses through our partners at Reanda International.</p>
                </span>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
?>