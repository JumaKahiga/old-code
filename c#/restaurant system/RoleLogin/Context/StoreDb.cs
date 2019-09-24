using RoleLogin.Models;
using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;
using RoleLogin.Models;

namespace RoleLogin.Context
{
    public class StoreDb : DbContext
    {
        public StoreDb()
            : base("DefaultConnection")
        {
        }
        public DbSet<Employee> Employees { get; set; }
        public DbSet<Department> Departments { get; set; }
        public DbSet<Product> Products { get; set; }
    }

    public class StoreDbInitializer : DropCreateDatabaseIfModelChanges<StoreDb>
    {
        protected override void Seed(StoreDb Context)
        {
            var products = new List<Product>
                {
                    new Product {   ProductId = 1,
                                    DepartmentId = 1,
                                    ProductName = "Soup",
                                    SupplierName = "s",
                                    SupplierDetail = "s"        
                                }
                };
            products.ForEach(d => Context.Products.Add(d));


        }
    }
}