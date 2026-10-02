// Keep approved content changes when the original UI Builder designs are re-imported.
import { load } from 'cheerio';
const insightPanel = `<div class="lg:col-span-5 insight-panel" aria-label="Business insights overview">
  <p class="insight-panel-label">Business insights</p>
  <p class="insight-panel-title">See what your data is telling you.</p>
  <dl class="insight-list">
    <div><dt>Performance trends</dt><dd>Understand how revenue, costs, and activity change over time.</dd></div>
    <div><dt>Operational bottlenecks</dt><dd>Find delays and repeated work across your business processes.</dd></div>
    <div><dt>Decision-ready reporting</dt><dd>Bring key findings together in clear, focused dashboards.</dd></div>
  </dl>
  <p class="insight-panel-note">Connected data. Clearer decisions.</p>
</div>`;

const systemsPanel = `<div class="lg:col-span-5 order-2 lg:order-1 insight-panel systems-panel" aria-label="Structured data workflow">
  <p class="insight-panel-label">Reliable data foundations</p>
  <p class="insight-panel-title">A clear path from records to insights.</p>
  <ol class="system-flow">
    <li><strong>Store</strong><span>PostgreSQL · MySQL · Firebase</span></li>
    <li><strong>Structure &amp; validate</strong><span>Consistent records and defined relationships</span></li>
    <li><strong>Connect &amp; report</strong><span>Dependable information for your team</span></li>
  </ol>
  <p class="insight-panel-note">Built for consistency, security, and long-term use.</p>
</div>`;

export function refineContent(html) {
  html = html.replaceAll('+265 881 536 054', '+265 991 538 162').replaceAll('+265881536054', '+265991538162');
  html = html.replace(/(<section\b[^>]*id="about"[^>]*>)([\s\S]*?)(<\/section>)/, (_, start, body, end) => {
    body = body.replace('>Airflow</span>', '>MySQL</span>').replace('>Kafka</span>', '>Firebase</span>');
    body = body.replace(/<span\b[^>]*>ClickHouse<\/span>\s*/g, '');
    return start + body + end;
  });
  html = html.replace(/<span\b[^>]*>(?:Webhook Brokers|Cron Automation)<\/span>\s*/g, '');
  // Parse only these static sections; leave PHP-backed forms and templates intact.
  html = html.replace(/<section\b[^>]*>[\s\S]*?<\/section>/g, section => {
    if (!/data-[12]\.jpg|id="what-we-do"|id="showcase"/.test(section)) return section;
    const $ = load(section, {}, false);
    $('img[src="/assets/img/redesign/data-1.jpg"]').parent().replaceWith(insightPanel);
    $('img[src="/assets/img/redesign/data-2.jpg"]').parent().replaceWith(systemsPanel);
    $('#what-we-do h3').filter((_, el) => $(el).text().trim() === 'Media Direction').parent().parent().remove();
    $('#what-we-do .lg\\:grid-cols-4').removeClass('lg:grid-cols-4').addClass('lg:grid-cols-3');
    $('#showcase [data-tone]').first().parent().remove();
    return $.html();
  });
  return html;
}
