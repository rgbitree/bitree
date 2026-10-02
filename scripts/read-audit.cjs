const fs = require('node:fs');
for (const name of ['data', 'studio']) {
  const path = `.qa/lighthouse-${name}.json`;
  if (!fs.existsSync(path)) continue;
  const report = JSON.parse(fs.readFileSync(path));
  console.log(name, Object.fromEntries(Object.entries(report.categories).map(([k, v]) => [k, v.score])));
  for (const ref of report.categories.accessibility.auditRefs) {
    const audit = report.audits[ref.id];
    if (audit.score !== null && audit.score < 1) console.log(ref.id, JSON.stringify(audit.details?.items).slice(0,7000));
  }
  console.log('Metrics', report.audits['largest-contentful-paint'].displayValue, report.audits['cumulative-layout-shift'].displayValue);
}
