# Web-Based Employee Leave Management Information System (Si Cuti Dinsos)

> **Web-Based Employee Leave Management & Multi-Role Approval Workflow Powered by Laravel**

![PHP](https://img.shields.io/badge/PHP-%3E%3D%207.4%20%7C%208.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Framework](https://img.shields.io/badge/Framework-Laravel%208.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Database](https://img.shields.io/badge/Database-MySQL%20%7C%20MariaDB-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Frontend-Bootstrap%203.3.7-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![DataTables](https://img.shields.io/badge/Table-DataTables%20Plugins-007ACC?style=for-the-badge)
![jQuery](https://img.shields.io/badge/Scripts-jQuery-0769AD?style=for-the-badge&logo=jquery&logoColor=white)

---

## Overview & Case Study

The Department of Social Services (**Dinas Sosial**) plays a critical frontline role in delivering social assistance, rehabilitative programs, and managing the Integrated Referral and Service System (**SLRT - Sistem Layanan dan Rujukan Terpadu**) for vulnerable communities. To maintain continuous and high-quality public service delivery across key divisions—such as Social Rehabilitation (*Rehabsos*), Poverty Alleviation (*PFM - Penanganan Fakir Miskin*), and Social Protection (*Linjamsos*)—proper management of human resource availability is paramount.

Historically, employee leave requests relied on manual paperwork, physical signature sheets, and fragmented ledgers. This traditional approach resulted in several critical challenges:
- **Administrative Delays:** Slow verification and approval turnarounds between field staff, SLRT supervisors, and central administrative officers.
- **Quota Tracking Inaccuracies:** Human errors when manually computing accrued annual leave, approved leave days, and remaining balances per fiscal year.
- **Lack of Transparency:** Prospective applicants lacked real-time visibility into their remaining quotas and approval status.

To address these issues, **Si Cuti Dinsos** was developed as a centralized, role-based web application built with **Laravel**. It digitizes the entire leave application lifecycle: automated quota allocation per fiscal year, automated pre-submission balance validation, multi-tier verification workflows, dynamic database view calculations, and comprehensive department-wide leave recapitulation.

---

## Multi-Role Access Control Matrix

| Capability / Module | Admin | Staf SLRT | Pegawai |
| :--- | :---: | :---: | :---: |
| **Dashboard Statistics** | Full System Overview | SLRT Operations Overview | Personal Leave Overview |
| **Manage Pegawai (CRUD)** | Yes | Yes | Read Own Profile |
| **Manage Staf SLRT (CRUD)** | Yes | No | No |
| **Annual Quota Config (CRUD)** | Yes | Yes | Read Only |
| **Submit Leave Request** | No | No | Yes |
| **Verify / Approve / Reject Leave** | Yes | Yes | No |
| **Leave Recapitulation Report** | Yes | Yes | No |

---

## Technology Stack

- **Backend Framework:** Laravel 8.x (PHP 7.4 / 8.0+)
- **Architecture Pattern:** Model-View-Controller (MVC) with custom Role-Based Session Middleware (`authAdmin`, `authStafSLRT`, `authPegawai`)
- **Database Engine:** MySQL / MariaDB (InnoDB, relational constraints, Dynamic SQL View `sisa_cuti`)
- **Frontend Template:** Blade Templating Engine, Elite Admin Responsive UI
- **Styling & Components:** Bootstrap 3.3.7, Bootstrap Extension, Animate.css, Font Awesome
- **Client-Side Scripts:** jQuery, DataTables (with CSV/Excel/PDF export plugins), Morris.js charts
- **Authentication:** Custom Multi-Table Session Guard with MD5 credential hashing
